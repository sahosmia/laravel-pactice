<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Tag;

class TagRepository
{
    public function all()
    {
        return Tag::latest()->get();
    }

    public function findById($id)
    {
        return Tag::with('products')->findOrFail($id);
    }

    public function create(array $data)
    {
        return Tag::create($data);
    }

    public function update($id, array $data)
    {
        $tag = Tag::findOrFail($id);
        $tag->update($data);
        return $tag;
    }

    public function delete($id)
    {
        $tag = Tag::findOrFail($id);
        return $tag->delete();
    }
}
