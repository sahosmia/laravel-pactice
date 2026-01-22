@extends('product::layouts.master')

@section('module_content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ isset($brand) ? 'Edit' : 'Create' }} Brand</h1>

        <form action="{{ isset($brand) ? route('brands.update', $brand->id) : route('brands.store') }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($brand))
            @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" name="name" type="text" value="{{ old('name', $brand->name ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="logo">Logo URL</label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="logo" name="logo" type="text" value="{{ old('logo', $brand->logo ?? '') }}">
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                <select
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="status" name="status">
                    <option value="1" {{ old('status', $brand->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $brand->status ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ isset($brand) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('brands.index') }}" class="text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
