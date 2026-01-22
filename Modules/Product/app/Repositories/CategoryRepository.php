<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Category;

class CategoryRepository
{
    public function all()
    {
        return Category::with(['parent', 'children'])->latest()->get();
    }

    public function findById($id)
    {
        return Category::with(['parent', 'children', 'products'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Category::create($data);
    }

    public function update($id, array $data)
    {
        $category = Category::findOrFail($id);
        $category->update($data);
        return $category;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        return $category->delete();
    }
}
