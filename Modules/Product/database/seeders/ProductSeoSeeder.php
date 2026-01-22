<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductSeo;

class ProductSeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        foreach ($products as $product) {
            ProductSeo::create([
                'product_id'       => $product->id,
                'meta_title'       => $product->name . ' - Buy Online',
                'meta_description' => 'Great deals on ' . $product->name . '. ' . $product->short_description,
                'meta_keywords'    => str_replace(' ', ',', $product->name) . ',buy,online',
            ]);
        }
    }
}
