@extends('frontend.layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @auth
                <h1>
                    Add invoice
                </h1>
                <div wire:key='form'>
                    <livewire:invoice.invoice-component />
                </div>
            @else
                Nothing here, please login!!!
            @endauth
        </div>
    </div>
@endsection
