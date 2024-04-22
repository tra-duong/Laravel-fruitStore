<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Livewire\Forms\CategoryForm;
use App\Models\FruitCategory;

class UpdateCategoryComponent extends Component
{
    public CategoryForm $form;
    public $component_title;
    public $submit_label;
    public $category_id;
    public $category;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->category = FruitCategory::find($this->category_id);
        $this->component_title = 'Update category:';
        $this->submit_label = 'Update';
        $this->form->setCategory($this->category);
    }
    public function render()
    {
        return view('livewire.category.category-form');
    }
    public function save()
    {
        $this->form->update();
        session()->flash('success_message', "{$this->form->title} updated!");
        $this->resetExcept(['units', 'categories']);
        return redirect()->route('dashboard.category_page');
    }
}
