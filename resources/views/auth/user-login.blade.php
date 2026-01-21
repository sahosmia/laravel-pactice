@extends('layouts.auth')
@section('content')
<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <h2 class="">User Login</h2>

    <x-form.input name="email" label="Email" />
    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember">Remember Me</label>
    </div>

    <button type="submit">Login</button>
</form>
@endsection
