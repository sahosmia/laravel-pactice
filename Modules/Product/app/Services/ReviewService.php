<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\ReviewRepository;

class ReviewService
{
    protected $reviewRepository;

    public function __construct(ReviewRepository $reviewRepository)
    {
        $this->reviewRepository = $reviewRepository;
    }

    public function all()
    {
        return $this->reviewRepository->all();
    }

    public function find($id)
    {
        return $this->reviewRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->reviewRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->reviewRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->reviewRepository->delete($id);
    }
}
