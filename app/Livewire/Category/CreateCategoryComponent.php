<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\CategoryForm;
use Livewire\Component;

class CreateCategoryComponent extends Component
{
    public CategoryForm $form;
    public $component_title;
    public $submit_label;

    /**
     * Mount params.
     *
     * @return void
     */
    public function mount()
    {
        $this->component_title = 'Create Fruit';
        $this->submit_label = 'Create';
    }
    public function render()
    {
        return view('livewire.category.category-form');
    }
    public function save()
    {
        $this->form->store();
        session()->flash('success_message', "{$this->form->title} created!");
        return redirect()->route('dashboard.category_page');
    }
}
