<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\CategoryForm;
use App\Models\FruitCategory;
use Livewire\Component;

class DeleteCategoryComponent extends Component
{
    public CategoryForm $form;
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
        $this->form->setCategory($this->category);
    }

    public function render()
    {
        return view('livewire.category.delete-category');
    }
    public function save()
    {
        if (!$this->category) {
            session()->flash('error_message', 'Category not found');
            return;
        }
        $this->form->delete();
        session()->flash('success_message', "{$this->category->title} deleted!");
        return redirect()->route('dashboard.category_page');
    }
}
