<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;
use Modules\Product\Models\ProductSpecification;

class ProductSpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $specs = [
            'Weight' => '1.5kg',
            'Dimensions' => '10x20x5 cm',
            'Material' => 'Plastic/Metal',
            'Warranty' => '1 Year',
            'Origin' => 'China',
        ];

        foreach ($products as $product) {
            foreach ($specs as $key => $value) {
                ProductSpecification::create([
                    'product_id' => $product->id,
                    'spec_key'   => $key,
                    'spec_value' => $value,
                ]);
            }
        }
    }
}
