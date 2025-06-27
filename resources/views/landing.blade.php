@extends('layouts.header')
@section('title', 'Landing Page')
@section('content')
    <h1>Welcome</h1>
    @if($user)
        <p>Hello, {{ $user->name }}!</p>
        <p>Role: {{ $user->role }}</p>
        <form action="{{ url('/set-role') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">
                Set as {{ $user->role === 'admin' ? 'User' : 'Admin' }}
            </button>
        </form>
    @else
        <p>Use login and register to see more features.</p>
    @endif
@endsection
