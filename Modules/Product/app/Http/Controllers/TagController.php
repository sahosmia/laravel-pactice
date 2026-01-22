<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Services\TagService;
use Modules\Product\Http\Requests\StoreTagRequest;
use Modules\Product\Http\Requests\UpdateTagRequest;
use Illuminate\Support\Str;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index()
    {
        $tags = $this->tagService->all();
        return view('product::tags.index', compact('tags'));
    }

    public function create()
    {
        return view('product::tags.create');
    }

    public function store(StoreTagRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->tagService->create($data);

        return redirect()->route('tags.index')->with('success', 'Tag created successfully.');
    }

    public function show($id)
    {
        $tag = $this->tagService->find($id);
        return view('product::tags.show', compact('tag'));
    }

    public function edit($id)
    {
        $tag = $this->tagService->find($id);
        return view('product::tags.edit', compact('tag'));
    }

    public function update(UpdateTagRequest $request, $id)
    {
        $data = $request->validated();
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $this->tagService->update($id, $data);

        return redirect()->route('tags.index')->with('success', 'Tag updated successfully.');
    }

    public function destroy($id)
    {
        $this->tagService->delete($id);
        return redirect()->route('tags.index')->with('success', 'Tag deleted successfully.');
    }
}
