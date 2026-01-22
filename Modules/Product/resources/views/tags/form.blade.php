@extends('product::layouts.master')

@section('module_content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ isset($tag) ? 'Edit' : 'Create' }} Tag</h1>

        <form action="{{ isset($tag) ? route('tags.update', $tag->id) : route('tags.store') }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @if(isset($tag))
            @method('PUT')
            @endif

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Name</label>
                <input
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="name" name="name" type="text" value="{{ old('name', $tag->name ?? '') }}" required>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    {{ isset($tag) ? 'Update' : 'Create' }}
                </button>
                <a href="{{ route('tags.index') }}" class="text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
