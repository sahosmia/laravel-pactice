<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function all()
    {
        return Product::with(['category', 'brand', 'tags'])->latest()->get();
    }

    public function findById($id)
    {
        return Product::with(['category', 'brand', 'images', 'tags', 'seo', 'specifications'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            $product = Product::create($data);

            if (isset($data['images'])) {
                foreach ($data['images'] as $image) {
                    $product->images()->create($image);
                }
            }

            if (isset($data['seo'])) {
                $product->seo()->create($data['seo']);
            }

            if (isset($data['specifications'])) {
                foreach ($data['specifications'] as $spec) {
                    $product->specifications()->create($spec);
                }
            }

            if (isset($data['tag_ids'])) {
                $product->tags()->sync($data['tag_ids']);
            }

            return $product;
        });
    }

    public function update($id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {
            $product = Product::findOrFail($id);
            $product->update($data);

            if (isset($data['images'])) {
                $product->images()->delete();
                foreach ($data['images'] as $image) {
                    $product->images()->create($image);
                }
            }

            if (isset($data['seo'])) {
                $product->seo()->updateOrCreate([], $data['seo']);
            }

            if (isset($data['specifications'])) {
                $product->specifications()->delete();
                foreach ($data['specifications'] as $spec) {
                    $product->specifications()->create($spec);
                }
            }

            if (isset($data['tag_ids'])) {
                $product->tags()->sync($data['tag_ids']);
            }

            return $product;
        });
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }
}
