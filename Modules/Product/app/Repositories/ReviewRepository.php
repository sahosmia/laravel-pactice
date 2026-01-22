<?php

namespace Modules\Product\Repositories;

use Modules\Product\Models\Review;

class ReviewRepository
{
    public function all()
    {
        return Review::with(['product', 'user'])->latest()->get();
    }

    public function findById($id)
    {
        return Review::with(['product', 'user'])->findOrFail($id);
    }

    public function create(array $data)
    {
        return Review::create($data);
    }

    public function update($id, array $data)
    {
        $review = Review::findOrFail($id);
        $review->update($data);
        return $review;
    }

    public function delete($id)
    {
        $review = Review::findOrFail($id);
        return $review->delete();
    }
}
