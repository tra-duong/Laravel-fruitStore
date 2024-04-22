<?php

namespace App\Livewire\Invoice;

use App\Livewire\Forms\InvoiceForm;
use App\Models\Fruit;
use App\Models\Invoice;
use Livewire\Component;

class UpdateInvoiceComponent extends Component
{
    public InvoiceForm $form;
    public $invoice_id;
    public $component_title;
    public $submit_label;
    public $fruits;
    public $items;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->fruits = Fruit::all();
        $invoice = Invoice::find($this->invoice_id);
        $this->form->setInvoice($invoice);
        $this->component_title = 'Update invoice:';
        $this->submit_label = 'Update';
    }

    /**
     * Render create or edit based on current_fruit.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    #[On('invoiceItemAdded')]
    public function render()
    {
        return view('livewire.invoice.invoice-form');
    }
    public function removeItem($index)
    {
        unset($this->form->items[$index]);
        $this->dispatch('itemRemoved');
    }
    public function addItem()
    {
        $raw_item = [
            "fruit" => new Fruit(),
            "quantity" => null,
            "amount" => null,
        ];
        $this->form->items[] = $raw_item;
        $this->dispatch('invoiceItemAdded');
    }

    /**
     * Auto calculate & save fruit.
     * @return void
     */
    public function save()
    {
        foreach ($this->form->items as $index => $item) {
            $selected_fruit = Fruit::find($item['new_fruit'] ?? $item['fruit']['id']);
            if ($selected_fruit) {
                $this->form->items[$index]['fruit'] = $selected_fruit->toArray();
                $this->form->items[$index]['amount'] = $this->form->items[$index]['quantity'] * $selected_fruit->price;
            } else {
                unset($this->form->items[$index]);
            }
            unset($this->form->items['index']['new_fruit']);
        }
        $this->form->items = array_values($this->form->items);
        $this->form->invoice->items = json_encode($this->form->items);
        $this->form->update();
        session()->flash('success_message', "Invoice {$this->form->invoice->id} updated!");
        $this->resetExcept(['units', 'categories']);
        return redirect()->route('dashboard.invoice_page');
    }

    public function getFruitById($fruit_id)
    {
        return $this->fruits->firstWhere('id', $fruit_id);
    }
}
