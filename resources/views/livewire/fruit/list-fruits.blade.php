@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @include('livewire.fruit.create-fruit')
            <div>
                <h1>List of Fruits</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginator->items() as $fruit)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $fruit->title }}</td>
                                <td>{{ $fruit->category->title }}</td>
                                <td>{{ $fruit->unit }}</td>
                                <td>{{ rtrim(rtrim(number_format($fruit->price, 2, '.', ','), '0'), '.') }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary edit-fruit-btn"
                                        data-bs-toggle="modal" data-bs-target="#editFruitModal-{{ $fruit->id }}"
                                        data-fruit-id="{{ $fruit->id }}">Edit</button>
                                    <button type="button" class="btn btn-light delete-fruit-btn" data-bs-toggle="modal"
                                        data-bs-target="#confirmFruitModal-{{ $fruit->id }}"
                                        data-fruit-id="{{ $fruit->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $paginator->links() }}
            </div>
        </div>
    </div>
    @foreach ($paginator->items() as $fruit)
        <div class="modal fade" id="editFruitModal-{{ $fruit->id }}" tabindex="-1"
            aria-labelledby="editFruitModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div wire:key='fruit_form'>
                        <livewire:fruit.update-fruit-component :fruit_id="$fruit->id" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($paginator->items() as $fruit)
        <div class="modal fade" id="confirmFruitModal-{{ $fruit->id }}" tabindex="-1"
            aria-labelledby="editFruitModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div wire:key='delete_form'>
                        <livewire:fruit.delete-fruit-component :fruit_id="$fruit->id" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
