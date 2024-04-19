<div>
    <form wire:submit.prevent="save">
        <div class="modal-header">
            <h5 class="modal-title" id="editFruitModalLabel">Delete category: <i>{{ $category->title }}</i></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Deleting cannot be undone, are you sure?
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary btn-light" data-bs-dismiss="modal">Cancel</button>
        </div>
    </form>
</div>
