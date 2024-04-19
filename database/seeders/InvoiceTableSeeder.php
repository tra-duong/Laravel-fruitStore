<?php

namespace Database\Seeders;

use App\Models\Invoice;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Invoice::create(
            [
                'customer_name' => 'Customer 1',
                'items' => [
                    0 => [
                        "fruit" => [
                            "id" => 4,
                            "title" => "China big apple",
                            "slug" => "china-big-apple",
                            "price" => "8.00",
                            "unit" => "pcs",
                            "stock" => 9999,
                            "category_id" => 1,
                        ],
                        "quantity" => "11",
                        "amount" => 88
                    ]
                ],
                'author_id' => '1'
            ]
        );
        Invoice::create(
            [
                'customer_name' => 'Customer 2',
                'items' => [
                    0 => [
                        "fruit" => [
                            "id" => 4,
                            "title" => "China big apple",
                            "slug" => "china-big-apple",
                            "price" => "8.00",
                            "unit" => "pcs",
                            "stock" => 9999,
                            "category_id" => 1,
                        ],
                        "quantity" => "11",
                        "amount" => 88
                    ],
                    1 => [
                        "fruit" => [
                            "id" => 2,
                            "title" => "Vietnam small apple",
                            "slug" => "vietnam-small-apple",
                            "price" => "2.00",
                            "unit" => "pcs",
                            "stock" => 9999,
                            "category_id" => 1,
                        ],
                        "quantity" => "2",
                        "amount" => 4
                    ]
                ],
                'author_id' => '1'
            ]
        );
    }
}
