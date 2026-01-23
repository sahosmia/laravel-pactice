@extends('layouts.app')

@section('content')
    <h1>Welcome to the Developer Page</h1>

    {{-- Success Message  --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <a href="{{route('developer.cache.clear')}}" class="border border-orange-500 px-5 py-3 inline-block">Cache Clear</a>
    <a href="{{route('developer.cache.clear')}}" class="border border-orange-500 px-5 py-3 inline-block">Cache Clear</a>
@endsection
