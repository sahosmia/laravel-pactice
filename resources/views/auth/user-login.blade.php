<form method="POST" action="{{ route('admin.login.submit') }}">
    @csrf

    <h2>User Login</h2>

    <div>
        <label>Email Address</label>
        <input type="email" name="email" value="{{ old('email') }}" required autofocus>
    </div>

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
