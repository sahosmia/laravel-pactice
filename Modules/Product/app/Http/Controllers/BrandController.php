<?php

namespace Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Product\Services\BrandService;
use Modules\Product\Http\Requests\StoreBrandRequest;
use Modules\Product\Http\Requests\UpdateBrandRequest;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(BrandService $brandService)
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands = $this->brandService->all();
        return view('product::brands.index', compact('brands'));
    }

    public function create()
    {
        return view('product::brands.create');
    }

    public function store(StoreBrandRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['name']);
        $this->brandService->create($data);

        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');
    }

    public function show($id)
    {
        $brand = $this->brandService->find($id);
        return view('product::brands.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = $this->brandService->find($id);
        return view('product::brands.edit', compact('brand'));
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        $data = $request->validated();
        if (isset($data['name'])) {
            $data['slug'] = Str::slug($data['name']);
        }
        $this->brandService->update($id, $data);

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy($id)
    {
        $this->brandService->delete($id);
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
