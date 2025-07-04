<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Practica ST')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Test</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('formular') }}">Formular</a></li>
                        @if(auth()->user()->role === 'admin')
                            <li class="nav-item"><a class="nav-link" href="{{ url('insert-model') }}">Insert Model</a></li>
                            <li class="nav-item"><a class="nav-link" href="{{ url('display-model') }}">Display Model</a></li>
                        @endif
                        <li class="nav-item">
                            <form action="{{ url('logout') }}" method="GET" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link" style="display:inline; cursor:pointer;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">Register</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
