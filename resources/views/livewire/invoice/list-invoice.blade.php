@extends('backend.layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <h1>List of invoices</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Customer</th>
                            <th scope="col">Items</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Created by</th>
                            <th scope="col">Created date</th>
                            <th>{{ __('Operation') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($paginator->items() as $invoice)
                            @php
                                $items = [];
                                $fruits = '';
                                $amount = $quantity = 0;
                                foreach ($invoice->items as $item) {
                                    $items[] = $item['fruit']['title'];
                                    $amount += $item['amount'];
                                    $quantity += $item['quantity'];
                                }
                                if (count($items) > 0) {
                                    $fruits = implode(', ', $items);
                                }
                            @endphp
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $invoice->customer_name }}</td>
                                <td>{{ $fruits }}</td>
                                <td>{{ $quantity }}</td>
                                <td>{{ $amount }}</td>
                                <td>{{ $invoice->author->name }}</td>
                                <td>{{ $invoice->created_at }}</td>
                                <td>
                                    <button type="button" class="btn btn-outline-primary edit-invoice-btn"
                                        data-bs-toggle="modal" data-bs-target="#editInvoiceModal-{{ $invoice->id }}"
                                        data-invoice-id="{{ $invoice->id }}">Edit</button>
                                    <button type="button" class="btn btn-light delete-invoice-btn" data-bs-toggle="modal"
                                        data-bs-target="#confirmInvoiceModal-{{ $invoice->id }}"
                                        data-invoice-id="{{ $invoice->id }}">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $paginator->links() }}
            </div>
        </div>
    </div>
    @foreach ($paginator->items() as $invoice)
        <div class="modal fade" id="editInvoiceModal-{{ $invoice->id }}" tabindex="-1"
            aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div wire:key='invoice_form'>
                        <livewire:invoice.update-invoice-component :invoice_id="$invoice->id" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    @foreach ($paginator->items() as $invoice)
        <div class="modal fade" id="confirmInvoiceModal-{{ $invoice->id }}" tabindex="-1"
            aria-labelledby="editInvoiceModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div wire:key='delete_form'>
                        <livewire:invoice.delete-invoice-component :invoice_id="$invoice->id" />
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
@section('scripts')
    <script src="{{ asset('js/script.js') }}"></script>
@endsection
