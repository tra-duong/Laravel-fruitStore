<?php

namespace App\Livewire\Invoice;

use App\Models\Fruit;
use App\Models\Invoice;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class InvoiceComponent extends Component
{
    public $input_name;
    public $customer_name;
    public $fruits;
    public $items = [];
    public $fruit;
    public $quantity;
    public $amount;
    public $total_amount;
    public function mount()
    {
        $this->fruits = Fruit::all();
    }

    /**
     * Handle add fruit on FE.
     *
     * @return void
     */
    public function addItem()
    {
        $added_fruit = Fruit::find($this->fruit);
        if (!$added_fruit) {
            return;
        }
        $existing_item = collect($this->items)->search(function ($item) {
            return $item['fruit']->id == $this->fruit;
        });
        if ($existing_item !== FALSE) {
            $this->items[$existing_item]['quantity'] += $this->quantity;
            $this->items[$existing_item]['amount'] = $this->items[$existing_item]['quantity'] * $added_fruit->price;
        } else {
            $this->items[] = [
                'fruit' => Fruit::find($this->fruit),
                'quantity' => $this->quantity,
                'amount' => $this->quantity * $added_fruit->price,
            ];
        }
        $this->total_amount = collect($this->items)->sum('amount');
        $this->reset(['fruit', 'quantity']);

        // Dispatch focus to 'fruit' field for quicker input.
        $this->dispatch('focus-field', field: 'fruit');

    }

    public function render()
    {
        return view('livewire.invoice.invoice');
    }
    public function save()
    {
        $invoice = new Invoice;
        $invoice->customer_name = $this->customer_name;
        $invoice->items = $this->items;
        $invoice->author_id = Auth::id();
        $invoice->save();

        // session()->flash('success_message', "{$this->form->title} created!");
        $this->resetExcept(['units', 'categories']);
        return redirect()->route('home');
    }
}
