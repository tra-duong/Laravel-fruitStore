@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('livewire.category.create-category')
            <div>
                <h1>List of Categories</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Numbers of fruit</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- {{ dd($paginator->items()) }} --}}
                        @foreach ($paginator->items() as $category)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $category->title }}</td>
                                <td>{{ $category->fruit_count }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary edit-category-btn"
                                        data-bs-toggle="modal" data-bs-target="#editCategoryModal-{{ $category->id }}"
                                        data-category-id="{{ $category->id }}">Edit</button>
                                    <button type="button" class="btn btn-light delete-category-btn" data-bs-toggle="modal"
                                        data-bs-target="#confirmCategoryModal-{{ $category->id }}"
                                        data-category-id="{{ $category->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $paginator->links() }}
            </div>
        </div>
    </div>
    @foreach ($paginator->items() as $category)
        <div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1"
            aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div wire:key='category_form'>
                        <livewire:category.update-category-component :category_id="$category->id" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($paginator->items() as $category)
        <div class="modal fade" id="confirmCategoryModal-{{ $category->id }}" tabindex="-1"
            aria-labelledby="editCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div wire:key='delete_form'>
                        <livewire:category.delete-category-component :category_id="$category->id" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
