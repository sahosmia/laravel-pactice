<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Services\ProductService;
use Modules\Product\Http\Requests\StoreProductRequest;
use Modules\Product\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use Modules\Product\Services\BrandService;
use Modules\Product\Services\CategoryService;
use Modules\Product\Services\TagService;

class ProductController extends Controller
{
    protected $productService;
    protected $categoryService;
    protected $brandService;
    protected $tagService;

    public function __construct(ProductService $productService, CategoryService $categoryService, BrandService $brandService, TagService $tagService)
    {
        $this->productService = $productService;
        $this->categoryService = $categoryService;
        $this->brandService = $brandService;
        $this->tagService = $tagService;
    }

    public function index()
    {
        $products = $this->productService->all();
        return view('product::products.index', compact('products'));
    }

    public function create()
    {
        $categories = $this->categoryService->all();
        $brands = $this->brandService->all();
        $tags = $this->tagService->all();
        return view('product::products.create', compact('categories', 'brands', 'tags'));
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->productService->create($data);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = $this->productService->find($id);
        return view('product::products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = $this->productService->find($id);
        $categories = $this->categoryService->all();
        $brands = $this->brandService->all();
        $tags = $this->tagService->all();
        return view('product::products.edit', compact('product', 'categories', 'brands', 'tags'));
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $data = $request->validated();
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $this->productService->update($id, $data);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $this->productService->delete($id);
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
