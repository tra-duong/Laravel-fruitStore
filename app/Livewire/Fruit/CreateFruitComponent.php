<?php

namespace App\Livewire\Fruit;

use App\Enums\UnitEnum;
use Livewire\Component;
use App\Models\FruitCategory;
use App\Livewire\Forms\FruitForm;

class CreateFruitComponent extends Component
{
    public FruitForm $form;
    public $categories;
    public $units;
    public $component_title;
    public $submit_label;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->categories = FruitCategory::all();
        $this->units = UnitEnum::toArray();
        $this->component_title = 'Create Fruit';
        $this->submit_label = 'Create';
    }
    public function render()
    {
        return view('livewire.fruit.fruit-form');
    }
    public function save()
    {
        $this->form->store();
        session()->flash('success_message', "{$this->form->title} created!");
        $this->resetExcept(['units', 'categories']);
        return redirect()->route('dashboard.fruit_page');
    }
}
