<?php

namespace Database\Seeders;

use App\Enums\UnitEnum;
use App\Models\Fruit;
use Illuminate\Database\Seeder;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fruit::factory()->create([
            'title' => 'Vietnam small apple',
            'slug' => 'vietnam-small-apple',
            'price' => '2',
            'unit' => UnitEnum::Pieces()->value,
            'stock' => '9999',
            'category_id' => 1,
        ]);
        Fruit::factory()->create([
            'title' => 'Vietnam big apple',
            'slug' => 'vietnam-big-apple',
            'price' => '10',
            'unit' => UnitEnum::Pack()->value,
            'stock' => '9999',
            'category_id' => 1,
        ]);
        Fruit::factory()->create([
            'title' => 'China small apple',
            'slug' => 'china-small-apple',
            'price' => '2',
            'unit' => UnitEnum::Pieces()->value,
            'stock' => '9999',
            'category_id' => 1,
        ]);
        Fruit::factory()->create([
            'title' => 'China big apple',
            'slug' => 'china-big-apple',
            'price' => '8',
            'unit' => UnitEnum::Pieces()->value,
            'stock' => '9999',
            'category_id' => 1,
        ]);
        Fruit::factory()->create([
            'title' => 'Vietnam big orange',
            'slug' => 'vietnam-big-orange',
            'price' => '5',
            'unit' => UnitEnum::Pieces()->value,
            'stock' => '9999',
            'category_id' => 2,
        ]);
    }
}
