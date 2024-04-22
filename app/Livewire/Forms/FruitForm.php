<?php

namespace App\Livewire\Forms;

use Livewire\Form;
use App\Models\Fruit;
use Livewire\Attributes\Validate;

class FruitForm extends Form
{
    public ?Fruit $fruit;
    #[Validate('required|string|max:255')]
    public $title;
    #[Validate(['required', 'numeric', 'regex:/^\d*(\.\d{1,2})?$/'])]
    public $price;
    #[Validate('required|in:pcs,pack,kg')]
    public $unit;
    #[Validate('required|integer|min:0')]
    public $stock;
    #[Validate('required|exists:fruit_categories,id')]
    public $category;

    /**
     * setFruit
     *
     * @param  int $fruit_id
     * @return void
     */
    public function setFruit(Fruit $fruit)
    {
        $this->fruit = $fruit;
        $this->title = $fruit->title;
        $this->price = $fruit->price;
        $this->unit = $fruit->unit;
        $this->stock = $fruit->stock;
        $this->category = $fruit->category_id;
    }

    public function store()
    {
        $validated = $this->validate();
        if (!$validated) {
            session()->flash('error_message', 'Please check input');
        }
        Fruit::create([
            'title' => $this->title,
            'price' => $this->price,
            'unit' => $this->unit,
            'stock' => $this->stock,
            'category_id' => $this->category,
        ]);
    }

    public function update()
    {
        $this->fruit->update(
            $this->all()
        );
    }
    public function delete()
    {
        $this->fruit->delete();
    }

}
