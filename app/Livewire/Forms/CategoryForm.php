<?php

namespace App\Livewire\Forms;

use App\Models\FruitCategory;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CategoryForm extends Form
{
    public ?FruitCategory $category;

    #[Validate('required|string|max:255')]
    public $title;

    /**
     * setCategory
     *
     * @param  int $category_id
     * @return void
     */
    public function setCategory(FruitCategory $category)
    {
        $this->category = $category;
        $this->title = $category->title;
    }

    public function store()
    {
        $validated = $this->validate();
        if (!$validated) {
            session()->flash('error_message', 'Please check input');
        }
        FruitCategory::create([
            'title' => $this->title,
        ]);
    }

    public function update()
    {
        $this->category->update(
            $this->all()
        );
    }
    public function delete()
    {
        $this->category->delete();
    }
}
