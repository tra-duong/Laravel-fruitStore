<?php

namespace App\Livewire\Fruit;

use App\Models\Fruit;
use Livewire\Component;
use App\Livewire\Forms\FruitForm;

class DeleteFruitComponent extends Component
{
    public FruitForm $form;
    public $fruit_id;
    public $fruit;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->fruit = Fruit::find($this->fruit_id);
        $this->form->setFruit($this->fruit);
    }
    public function render()
    {
        return view('livewire.fruit.delete-fruit');
    }

    public function save()
    {
        if (!$this->fruit) {
            session()->flash('error_message', 'Fruit not found');
            return;
        }
        $this->form->delete();
        session()->flash('success_message', "{$this->fruit->title} deleted!");
        return redirect()->route('dashboard.fruit_page');
    }

}
