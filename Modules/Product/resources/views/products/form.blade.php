@extends('product::layouts.master')

@section('module_content')
<div class="max-w-4xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ isset($product) ? 'Edit' : 'Create' }} Product</h1>

        <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.store') }}"
            method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($product))
            @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
                    id="name" name="name" type="text" value="{{ old('name', $product->name ?? '') }}" required>
                @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="sku">SKU</label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('sku') border-red-500 @enderror"
                    id="sku" name="sku" type="text" value="{{ old('sku', $product->sku ?? '') }}" required>
                @error('sku') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category</label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="category_id" name="category_id">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') ==
                            $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="brand_id">Brand</label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="brand_id" name="brand_id">
                        <option value="">None</option>
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}" {{ old('brand_id', $product->brand_id ?? '') == $brand->id ?
                            'selected' : '' }}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="short_description">Short
                    Description</label>
                <textarea
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="short_description" name="short_description"
                    rows="2">{{ old('short_description', $product->short_description ?? '') }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Full Description</label>
                <textarea
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="description" name="description"
                    rows="4">{{ old('description', $product->description ?? '') }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
                    <input
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="price" name="price" type="number" step="0.01"
                        value="{{ old('price', $product->price ?? '') }}" required>
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="stock_qty">Stock</label>
                    <input
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="stock_qty" name="stock_qty" type="number"
                        value="{{ old('stock_qty', $product->stock_qty ?? 0) }}" required>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="discount_value">Discount
                        Value</label>
                    <input
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="discount_value" name="discount_value" type="number" step="0.01"
                        value="{{ old('discount_value', $product->discount_value ?? '') }}">
                </div>
                <div>
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="discount_type">Discount Type</label>
                    <select
                        class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="discount_type" name="discount_type">
                        <option value="">None</option>
                        <option value="fixed" {{ old('discount_type', $product->discount_type ?? '') == 'fixed' ?
                            'selected' : '' }}>Fixed</option>
                        <option value="percentage" {{ old('discount_type', $product->discount_type ?? '') ==
                            'percentage' ? 'selected' : '' }}>Percentage</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div class="flex items-center">
                    <input type="checkbox" id="status" name="status" value="1" {{ old('status', $product->status ?? 1) ?
                    'checked' : '' }} class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="status" class="ml-2 block text-sm text-gray-900 font-bold">Active Status</label>
                </div>
                <div class="flex items-center">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured',
                        $product->is_featured ?? 0) ? 'checked' : '' }} class="h-4 w-4 text-indigo-600
                    focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="is_featured" class="ml-2 block text-sm text-gray-900 font-bold">Is Featured</label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Tags</label>
                <div class="flex flex-wrap gap-4">
                    @foreach($tags as $tag)
                    <div class="flex items-center">
                        <input type="checkbox" name="tag_ids[]" value="{{ $tag->id }}" id="tag_{{ $tag->id }}" {{
                            (isset($product) && $product->tags->contains($tag->id)) || (is_array(old('tag_ids')) &&
                        in_array($tag->id, old('tag_ids'))) ? 'checked' : '' }}
                        class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="tag_{{ $tag->id }}" class="ml-2 block text-sm text-gray-900">{{ $tag->name
                            }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="border-t border-gray-200 pt-4 mt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-4">SEO Information</h3>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_title">Meta Title</label>
                    <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="meta_title"
                        name="seo[meta_title]" type="text"
                        value="{{ old('seo.meta_title', $product->seo->meta_title ?? '') }}">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_description">Meta
                        Description</label>
                    <textarea class="shadow border rounded w-full py-2 px-3 text-gray-700" id="meta_description"
                        name="seo[meta_description]"
                        rows="2">{{ old('seo.meta_description', $product->seo->meta_description ?? '') }}</textarea>
                </div>
            </div>

            <div class="flex items-center justify-between pt-6 border-t border-gray-200">
                <button
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    {{ isset($product) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800 font-bold">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
