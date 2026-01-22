<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductImage;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            // Main thumbnail
            ProductImage::create([
                'product_id'   => $product->id,
                'image'        => 'products/main-' . $product->id . '.png',
                'is_thumbnail' => 1,
            ]);

            // Additional images
            for ($i = 1; $i <= 3; $i++) {
                ProductImage::create([
                    'product_id'   => $product->id,
                    'image'        => 'products/gallery-' . $product->id . '-' . $i . '.png',
                    'is_thumbnail' => 0,
                ]);
            }
        }
    }
}
