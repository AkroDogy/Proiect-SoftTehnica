@extends('layouts.header')
@section('title', 'Register')
@section('content')
<h2>Register</h2>

<form method="POST" action="{{ url('register') }}">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Username:</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required autofocus>
        @error('name')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        @error('email')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Pass:</label>
        <input type="password" name="password" id="password" class="form-control" required>
        @error('password')<div class="text-danger">{{ $message }}</div>@enderror
    </div>
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm pass:</label>
        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
<p class="mt-3">
    <a href="{{ url('login') }}">Login</a>.
</p>
@endsection
