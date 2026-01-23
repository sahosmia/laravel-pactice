@extends('layouts.app')

@section('content')
    <h1>Welcome to the Home Page</h1>
    <ul>
        @foreach ($categories as $item)
        <li>{{$item}}</li>
        @endforeach
    </ul>
    @endsection
