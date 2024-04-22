<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Invoice;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;

class InvoiceForm extends Form
{
    public ?Invoice $invoice;
    #[Validate('required|string|max:255')]
    public $customer_name;
    #[Validate('required')]
    public $items;
    public $selected_fruits;
    #[Validate('required|exists::App\Models\User,id')]
    public $author_id;

    /**
     * setFruit
     *
     * @param  int $fruit_id
     * @return void
     */
    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;
        $this->customer_name = $invoice->customer_name;
        $this->items = $invoice->items;
        $this->author_id = $invoice->author_id;
    }

    public function store()
    {
        $validated = $this->validate();
        if (!$validated) {
            session()->flash('error_message', 'Please check input');
        }
        Invoice::create([
            'customer_name' => $this->customer_name,
            'items' => json_encode($this->items),
            'author_id' => Auth::id(),
        ]);
    }

    public function update()
    {
        $this->invoice->update(
            $this->all()
        );
    }
    public function delete()
    {
        $this->invoice->delete();
    }
}
