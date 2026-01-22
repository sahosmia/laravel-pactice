<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Brand;

class BrandRepository
{
    public function all()
    {
        return Brand::latest()->get();
    }

    public function findById($id)
    {
        return Brand::with('products')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Brand::create($data);
    }

    public function update($id, array $data)
    {
        $brand = Brand::findOrFail($id);
        $brand->update($data);
        return $brand;
    }

    public function delete($id)
    {
        $brand = Brand::findOrFail($id);
        return $brand->delete();
    }
}
