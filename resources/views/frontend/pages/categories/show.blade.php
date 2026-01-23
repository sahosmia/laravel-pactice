@extends('layouts.app')

@section('content')
<div class="bg-gray-50 min-h-screen">
    <header class="bg-white border-b">
        <div class="container mx-auto px-6 py-8">
            <nav class="flex mb-4 text-sm text-gray-500" aria-label="Breadcrumb">
                <a href="/" class="hover:text-indigo-600">Home</a>
                <span class="mx-2">/</span>
                <span class="text-gray-800 font-medium">Shop</span>
            </nav>
            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                {{ $category->name }}
            </h1>
        </div>
    </header>

    <div class="container mx-auto p-6 flex flex-col lg:flex-row gap-8">

        <aside class="w-full lg:w-1/4 xl:w-1/5">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 sticky top-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-filter text-indigo-600"></i> Filters
                </h3>

                <div class="space-y-6">
                    <div>
                        <p class="font-semibold text-sm mb-3">Price Range</p>
                        <input type="range"
                            class="w-full h-2 bg-gray-200 rounded-lg appearance-none cursor-pointer accent-indigo-600">
                    </div>
                    <div>
                        <p class="font-semibold text-sm mb-3">Brands</p>
                        <div class="space-y-2">
                            <label class="flex items-center text-sm text-gray-600 hover:text-indigo-600 cursor-pointer">
                                <input type="checkbox" class="rounded text-indigo-600 mr-2"> Samsung
                            </label>
                            <label class="flex items-center text-sm text-gray-600 hover:text-indigo-600 cursor-pointer">
                                <input type="checkbox" class="rounded text-indigo-600 mr-2"> Sony
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <main class="flex-1">
            <div
                class="bg-white rounded-2xl border border-gray-100 px-6 py-4 mb-8 flex flex-wrap items-center justify-between gap-4 shadow-sm">
                <p class="text-gray-500 text-sm">
                    Showing <span class="font-semibold text-gray-900">{{ $category->products->count() }}</span> products
                </p>

                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <label for="sort" class="text-sm font-medium text-gray-700">Sort by:</label>
                        <select id="sort"
                            class="bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2 outline-none">
                            <option value="default">Default Sorting</option>
                            <option value="price_low_high">Price: Low to High</option>
                            <option value="price_high_low">Price: High to Low</option>
                        </select>
                    </div>

                    <div class="flex items-center gap-2 border-l pl-4">
                        <label for="limit" class="text-sm font-medium text-gray-700">Show:</label>
                        <select id="limit"
                            class="bg-gray-50 border border-gray-200 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 p-2 outline-none">
                            <option value="12">12</option>
                            <option value="24">24</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach($category->products as $product)
<x-frontend::product-card :product="$product" :categoryName="$category->name" />                    @endforeach
            </div>
        </main>
    </div>
</div>
@endsection
