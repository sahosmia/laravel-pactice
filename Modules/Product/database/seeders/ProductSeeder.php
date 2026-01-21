<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Brand;
use Modules\Product\Models\Category;
use Modules\Product\Models\Product;
use Illuminate\Support\Str;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ফরেন কি এর জন্য আইডিগুলো নিয়ে আসা
        $categoryIds = Category::pluck('id');
        $brandIds = Brand::pluck('id');

        // যদি ক্যাটাগরি না থাকে তবে এরর এড়াতে চেক করা
        if ($categoryIds->isEmpty()) {
            $this->command->error('Please seed Categories first!');
            return;
        }

        $products = [
            'iPhone 15 Pro', 'Samsung Galaxy S23', 'Sony WH-1000XM5',
            'MacBook Air M2', 'Dell XPS 13', 'Logitech G Pro Mouse',
            'Nike Air Max', 'Adidas Ultraboost', 'Canon EOS R5'
        ];

        foreach ($products as $name) {
            Product::create([
                'name'              => $name,
                'slug'              => Str::slug($name) . '-' . rand(100, 999),
                'sku'               => 'SKU-' . strtoupper(Str::random(6)),
                'category_id'       => $categoryIds->random(),
                'brand_id'          => $brandIds->isNotEmpty() ? $brandIds->random() : null,
                'short_description' => 'This is a short description for ' . $name,
                'description'       => 'Full detailed description about ' . $name . '. This product is built with high quality materials.',
                'price'             => rand(500, 2000),
                'discount_value'    => rand(5, 20),
                'discount_type'     => fake()->randomElement(['fixed', 'percentage']),
                'stock_qty'         => rand(10, 100),
                'status'            => 1,
                'is_featured'       => rand(0, 1),
            ]);
        }
    }
}
