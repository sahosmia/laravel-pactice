@extends('layouts.app') {{-- Extends Root --}}

@section('content')
<div class="product-module-wrapper">
        <h2>master layout</h2>
        @yield('module_content') {{-- Custom hook for module pages --}}
    </div>
@endsection
