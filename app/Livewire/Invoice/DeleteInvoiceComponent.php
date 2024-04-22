<?php

namespace App\Livewire\Invoice;

use App\Livewire\Forms\InvoiceForm;
use App\Models\Invoice;
use Livewire\Component;

class DeleteInvoiceComponent extends Component
{
    public InvoiceForm $form;
    public $invoice_id;
    public $invoice;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->invoice = Invoice::find($this->invoice_id);
        $this->form->setInvoice($this->invoice);
    }
    public function render()
    {
        return view('livewire.invoice.delete-invoice');
    }

    public function save()
    {
        if (!$this->invoice) {
            session()->flash('error_message', 'Invoice not found');
            return;
        }
        $this->form->delete();
        session()->flash('success_message', "Invoice {$this->invoice->id} deleted!");
        return redirect()->route('dashboard.invoice_page');
    }
}
