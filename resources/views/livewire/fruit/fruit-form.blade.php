<div>
    <div class="modal-header">
        <h5 class="modal-title" id="editFruitModalLabel">{{ $component_title }}
            <i>{{ isset($fruit) ? $fruit->title : '' }}</i>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            <div class="form-group">
                <label for="title">Name</label>
                <input type="text" class="form-control @error('form.title') is-invalid @enderror" id="title"
                    placeholder="Enter fruit name" wire:model="form.title">
                @error('form.title')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control @error('form.price') is-invalid @enderror" id="price"
                    placeholder="Enter fruit price" wire:model="form.price" name="price" step="0.01">
                @error('form.price')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <select class="form-control @error('form.unit') is-invalid @enderror" id="unit" placeholder="Unit"
                    wire:model="form.unit" name='unit'>
                    <option value="">{{ __('Select unit') }}</option>
                    @foreach ($units as $unit_key => $unit_name)
                        <option value="{{ $unit_key }}">
                            {{ $unit_name }}</option>
                    @endforeach
                </select>
                @error('form.unit')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="stock">Stock</label>
                <input type="number" class="form-control @error('form.stock') is-invalid @enderror" id="stock"
                    placeholder="Stock" wire:model="form.stock" min=0>
                @error('form.stock')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="form-control @error('form.category') is-invalid @enderror" id="category"
                    placeholder="Category" wire:model="form.category">
                    <option value="">{{ __('Select category') }}</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">
                            {{ $category->title }}
                        </option>
                    @endforeach
                </select>
                @error('form.category')
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
