<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Livewire\Fruit\ListFruitComponent;
use App\Http\Controllers\DashboardController;
use App\Livewire\Invoice\ListInvoiceComponent;
use App\Livewire\Category\ListCategoryComponent;

Auth::routes();

Route::get('/', function () {
    return view('home');
})->name('home');

// Backend routes.
Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/invoice', ListInvoiceComponent::class)->name('invoice_page');
    Route::get('/fruit', ListFruitComponent::class)->name('fruit_page');
    Route::get('/category', ListCategoryComponent::class)->name('category_page');
});
