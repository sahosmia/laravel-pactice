@extends('product::layouts.master')

@section('module_content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ isset($category) ? 'Edit' : 'Create' }} Category</h1>

        <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}"
            method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($category))
            @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" name="name" type="text" value="{{ old('name', $category->name ?? '') }}" required>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="parent_id">Parent Category</label>
                <select
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="parent_id" name="parent_id">
                    <option value="">None</option>
                    @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ old('parent_id', $category->parent_id ?? '') == $cat->id ?
                        'selected' : '' }}>{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                <select
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="status" name="status">
                    <option value="1" {{ old('status', $category->status ?? 1) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $category->status ?? 1) == 0 ? 'selected' : '' }}>Inactive
                    </option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ isset($category) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('categories.index') }}" class="text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
