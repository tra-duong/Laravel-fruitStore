<div class="row">
    <div class="col-md-6">
        <form id="addInvoiceForm" wire:submit.prevent="addItem">
            <div class="row mt-1">
                <div class="col">
                    <input type="text" class="form-control" wire:model='customer_name' name="customer_name"
                        id="customer_name" placeholder="Customer name"="customer_name" oninput="updateCustomerName()"}}>
                </div>
            </div>
            <div class="row mt-1">
                <div class="col ">
                    <select class="select2 form-control" wire:model='fruit' name="fruit" id="fruit"
                        placeholder="Enter fruit" required>
                        <option value="">{{ __('Select fruit') }}</option>
                        @foreach ($fruits as $fruit)
                            <option value="{{ $fruit->id }}">{{ $fruit->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <input type="number" class="form-control" wire:model='quantity' name="quantity" id="quantity"
                        min="1" placeholder="Enter quantity" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col"></div>
                <div class='col-auto float-right'>
                    <button type="submit" class="btn btn-primary d-flex align-items-center">Add
                        <div class="d-inline">
                            <i class="bi bi-cart-plus align-middle px-1"></i>
                        </div>
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <div class='row mb-2'>
            <div class="col">
                <h4>Details:</h4>
            </div>
            <div class='col-auto float-right'>
                @if (count($items) > 0)
                    <button type="button" class="btn btn-secondary d-flex align-items-center" onclick="printAndSave()"
                        wire:click="save">Print
                        <div class="d-inline">
                            <i class="bi bi-printer align-middle px-1"></i>
                        </div>
                    </button>
                @endif
            </div>
        </div>
        <div class="row">
            <table class="table table-bordered table-striped d-print-table" id='invoice-preview'>
                <thead>
                    <tr>
                        <th scope="col" colspan="2">Customer</th>
                        <th scope="col" colspan="5" id='preview-customer-name'>{{ $customer_name }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">No</th>
                        <th scope="row">Category</th>
                        <th scope="row">Fruit</th>
                        <th scope="row">Unit</th>
                        <th scope="row">Price</th>
                        <th scope="row">Quantity</th>
                        <th scope="row">Amount</th>
                    </tr>
                    @foreach ($items as $item)
                        <tr class='item'>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>{{ $item['fruit']->category->title }}</td>
                            <td>{{ $item['fruit']->title }}</td>
                            <td>{{ $item['fruit']->unit }}</td>
                            <td class='number'>{{ $item['fruit']->price }}</td>
                            <td class='number'>{{ number_format($item['quantity']) }}</td>
                            <td class='number'>{{ number_format($item['amount']) }}</td>
                        </tr>
                    @endforeach
                    <tr class='summary table-secondary'>
                        <th scope="row" colspan="5"></th>
                        <th>Total</th>
                        <th>{{ number_format($total_amount) }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        Livewire.on('focus-field', (event) => {
            const field = event.field;
            document.getElementById(field).focus();
        });
    </script>
@endsection
