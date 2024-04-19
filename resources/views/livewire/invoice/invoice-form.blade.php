<div>
    <div class="modal-header">
        <h5 class="modal-title" id="editFruitModalLabel">{{ $component_title }}
            <i>{{ isset($invoice) ? $invoice->code : '' }}</i>
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form wire:submit.prevent="save">
        <div class="modal-body">
            <div class="form-group">
                <label for="title">Customer name</label>
                <input type="text" class="form-control @error('form.customer_name') is-invalid @enderror"
                    id="customer_name" placeholder="Enter customer name" wire:model="form.customer_name">
                @error('form.customer_name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="items">Items</label>
                <table class="table" id="table-{{ $form->invoice->id }}">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($form && $form->invoice && $form->invoice->items)
                            @foreach ($form->items as $item)
                                <tr id="row-{{ $form->invoice->id }}-{{ $loop->index }}"
                                    wire:key="item-{{ $form->invoice->id }}-{{ $loop->index }}">
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <select class="form-control" id="invoice-item-{{ $loop->index }}"
                                            name="invoice-item-{{ $loop->index }}"
                                            @if (!empty($form->items[$loop->index]['fruit']['id'])) wire:model="form.items.{{ $loop->index }}.fruit.id"
                                            @else
                                                wire:model.defer="form.items.{{ $loop->index }}.new_fruit" @endif>
                                            <option value="">Select fruit</option>
                                            @foreach (\App\Models\Fruit::all() as $fruit)
                                                <option value="{{ $fruit->id }}">
                                                    {{ $fruit->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number"
                                            class="form-control @error("form.quantity-{{ $loop->index }}") is-invalid @enderror"
                                            id="quantity-{{ $loop->index }}" placeholder="Quantity"
                                            wire:model="form.items.{{ $loop->index }}.quantity" />
                                        @error("form.items.{{ $loop->index }}.quantity")
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-danger"
                                            wire:click="removeItem({{ $loop->index }})"><i
                                                class="bi bi-trash"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
                <div>
                    <button type="button" class="btn btn-primary" wire:click='addItem()'><i
                            class="bi bi-plus-square-fill"></i></button>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class='btn btn-primary'>{{ $submit_label }}</button>
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
        </div>
    </form>
</div>
