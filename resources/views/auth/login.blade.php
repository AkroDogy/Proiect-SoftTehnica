@extends('layouts.header')
@section('title', 'Login')
@section('content')
<h2>Login</h2>
<form method="POST" action="{{ url('login') }}">
    @csrf
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        <label class="form-check-label" for="remember">Remember token</label>
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
<p class="mt-3">
    <a href="{{ url('register') }}">REGISTER</a>.
</p>
@endsection
