<?php

namespace Database\Seeders;

use App\Models\FruitCategory;
use Illuminate\Database\Seeder;

class FruitCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FruitCategory::create(
            [
                'title' => 'Apple',
                'slug' => 'apple',
            ]
        );
        FruitCategory::create(
            [
                'title' => 'Orange',
                'slug' => 'orange',
            ]
        );
        FruitCategory::create(
            [
                'title' => 'Pear',
                'slug' => 'pear',
            ]
        );
    }
}
