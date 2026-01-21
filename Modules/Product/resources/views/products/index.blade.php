@extends('product::layouts.master')

@section('module_content')
    <h1>Product Index Page</h1>
    
    @foreach ($data as $item)
        <div class="product-item">
            <h2>{{ $item->name }}</h2>
            <p>{{ $item->description }}</p>
        </div>
    @endforeach

    <p>Module: {!! config('product.name') !!} index</p>
@endsection
