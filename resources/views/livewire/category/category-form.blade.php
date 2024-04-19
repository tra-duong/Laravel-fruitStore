<div>
    <div class="modal-header">
        <h5 class="modal-title" id="editCategoryModalLabel">{{ $component_title }}
            <i>{{ isset($category) ? $category->title : '' }}</i>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control @error('form.title') is-invalid @enderror" id="title"
                    placeholder="Enter fruit name" wire:model="form.title">
                @error('title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class='btn btn-primary'>{{ $submit_label }}</button>
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        </div>
    </form>
</div>
