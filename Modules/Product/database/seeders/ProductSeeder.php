<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Sample Product 1',
                'description' => 'This is a description for Sample Product 1.',
                'price' => 19.99,
            ],
            [
                'title' => 'Sample Product 2',
                'description' => 'This is a description for Sample Product 2.',
                'price' => 29.99,
            ],
            [
                'title' => 'Sample Product 3',
                'description' => 'This is a description for Sample Product 3.',
                'price' => 39.99,
            ],
        ];

        foreach ($products as $product) {
            \Modules\Product\Models\Product::create($product);
        }
    }
}
