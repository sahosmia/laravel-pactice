@extends('layouts.app') {{-- Extends Root --}}

@section('content')
<div class="product-module-wrapper">
    <div class="p-5 w-full bg-indigo-500 text-2xl text-white text-center">{{ config('product.name') }} Module</div>
    @yield('module_content') {{-- Custom hook for module pages --}}
    </div>
@endsection
