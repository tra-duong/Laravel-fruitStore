<?php

namespace App\Livewire\Fruit;

use App\Models\Fruit;
use App\Enums\UnitEnum;
use Livewire\Component;
use App\Models\FruitCategory;
use App\Livewire\Forms\FruitForm;

class UpdateFruitComponent extends Component
{
    public FruitForm $form;
    public $categories;
    public $units;
    public $component_title;
    public $submit_label;
    public $fruit_id;
    public $fruit;
    public $new_fruit;
    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->categories = FruitCategory::all();
        $this->units = UnitEnum::toArray();
        $this->fruit = Fruit::find($this->fruit_id);
        $this->component_title = 'Update fruit:';
        $this->submit_label = 'Update';
        $this->form->setFruit($this->fruit);
    }

    /**
     * Render create or edit based on current_fruit.
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('livewire.fruit.fruit-form');
    }

    /**
     * Save fruit.
     * @return void
     */
    public function save()
    {
        $this->form->update();
        session()->flash('success_message', "{$this->form->title} updated!");
        $this->resetExcept(['units', 'categories']);
        return redirect()->route('dashboard.fruit_page');
    }
}
