<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\BrandRepository;

class BrandService
{
    protected $brandRepository;

    public function __construct(BrandRepository $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }

    public function all()
    {
        return $this->brandRepository->all();
    }

    public function find($id)
    {
        return $this->brandRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->brandRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->brandRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->brandRepository->delete($id);
    }
}
