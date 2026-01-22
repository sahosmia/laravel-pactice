<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Services\CategoryService;
use Modules\Product\Http\Requests\StoreCategoryRequest;
use Modules\Product\Http\Requests\UpdateCategoryRequest;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories = $this->categoryService->all();
        return view('product::categories.index', compact('categories'));
    }

    public function create()
    {
        $categories = $this->categoryService->all();
        return view('product::categories.create', compact('categories'));
    }

    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->categoryService->create($data);

        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function show($id)
    {
        $category = $this->categoryService->find($id);
        return view('product::categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = $this->categoryService->find($id);
        return view('product::categories.edit', compact('category'));
    }

    public function update(UpdateCategoryRequest $request, $id)
    {
        $data = $request->validated();
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $this->categoryService->update($id, $data);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $this->categoryService->delete($id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
