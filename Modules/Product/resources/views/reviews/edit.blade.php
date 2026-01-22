@extends('product::layouts.master')

@section('module_content')
<div class="max-w-2xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="px-4 py-6 sm:px-0">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Edit Review</h1>

        <form action="{{ route('reviews.update', $review->id) }}" method="POST"
            class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <p class="text-gray-700 text-sm font-bold mb-2">Product: <span class="font-normal">{{
                        $review->product->name }}</span></p>
                <p class="text-gray-700 text-sm font-bold mb-2">User: <span class="font-normal">{{ $review->user->name
                        }}</span></p>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">Rating</label>
                <select
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="rating" name="rating">
                    @for($i=1; $i<=5; $i++) <option value="{{ $i }}" {{ old('rating', $review->rating) == $i ?
                        'selected' : '' }}>{{ $i }} Stars</option>
                        @endfor
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">Comment</label>
                <textarea
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="comment" name="comment" rows="4">{{ old('comment', $review->comment) }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
                <select
                    class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="status" name="status">
                    <option value="pending" {{ old('status', $review->status) == 'pending' ? 'selected' : '' }}>Pending
                    </option>
                    <option value="approved" {{ old('status', $review->status) == 'approved' ? 'selected' : ''
                        }}>Approved</option>
                </select>
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">
                    Update Review
                </button>
                <a href="{{ route('reviews.index') }}" class="text-gray-600">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
