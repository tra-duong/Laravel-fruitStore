<?php

namespace App\Livewire\Invoice;

use App\Models\Invoice;
use Livewire\Component;
use App\Constants\Constants;

class ListInvoiceComponent extends Component
{
    protected $paginator;
    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->paginator = Invoice::paginate(Constants::ITEMS_PER_PAGE);
    }
    public function render()
    {
        return view('livewire.invoice.list-invoice', ['paginator' => $this->paginator]);
    }
}
