<?php

namespace Modules\Product\Services;

use Modules\Product\Repositories\TagRepository;

class TagService
{
    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function all()
    {
        return $this->tagRepository->all();
    }

    public function find($id)
    {
        return $this->tagRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->tagRepository->create($data);
    }

    public function update($id, array $data)
    {
        return $this->tagRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->tagRepository->delete($id);
    }
}
