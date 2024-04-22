<?php

namespace App\Livewire\Fruit;

use App\Constants\Constants;
use App\Models\Fruit;
use Livewire\Component;

class ListFruitComponent extends Component
{
    protected $paginator;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->paginator = Fruit::paginate(Constants::ITEMS_PER_PAGE);
    }
    public function render()
    {
        return view('livewire.fruit.list-fruits', ['paginator' => $this->paginator]);
    }
}
