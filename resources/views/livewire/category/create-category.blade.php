<div>
    <button type="button" class="btn btn-primary d-flex align-items-center" data-bs-toggle="modal"
        data-bs-target="#categoryFormModal">
        {{ __('Add category') }}
        <div class="d-inline">
            <i class="material-symbols-outlined opacity-10  align-middle ps-1">add_circle</i>
        </div>
    </button>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <!-- Modal for create category form -->
    <div wire:ignore.self id="categoryFormModal" class="modal fade" tabindex="-1"
        aria-labelledby="createCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="container">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif
                    <div wire:key='fruit_form'>
                        <livewire:category.create-category-component />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
