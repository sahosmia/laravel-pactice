<?php

namespace Modules\Product\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Product\Models\Product;
use Modules\Product\Models\Tag;
use Modules\Product\Models\ProductTag;

class ProductTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $tags = Tag::all();

        if ($tags->isEmpty()) {
            return;
        }

        foreach ($products as $product) {
            $randomTags = $tags->random(rand(1, 3));
            foreach ($randomTags as $tag) {
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id'     => $tag->id,
                ]);
            }
        }
    }
}
