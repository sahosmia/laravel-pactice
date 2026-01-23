@extends('layouts.app')

@section('content')
<div class="flex h-screen items-center justify-center bg-gray-50">
    <div class="text-center px-4">
        <h1 class="text-9xl font-extrabold text-gray-200">404</h1>
        <h2 class="mt-4 text-3xl font-bold text-gray-700">Oops! Page not found.</h2>
        <p class="mt-2 text-gray-500">The page you are looking for might have been removed or is temporarily
            unavailable.</p>
        <a href="{{ url('/') }}"
            class="mt-6 inline-block rounded-lg bg-indigo-600 px-6 py-3 text-white font-medium hover:bg-indigo-700">
            Go to Home
        </a>
    </div>
</div>
@endsection
