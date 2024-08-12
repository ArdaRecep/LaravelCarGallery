<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </li>
                                    <li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
            <style>
                body,
                .card {
                    background-color: #1b1b1b;
                }

                body,
                main {
                    height: 100vh;
                }

                .card {
                    top: 50%;
                    right: 50%;
                    transform: translate(50%, -50%);
                    position: absolute;
                    width: 700px;
                    border-color: #8f8f8f;
                }

                input::placeholder {
                    color: #ffffffc5 !important;
                }

                input {
                    color: #ffffff !important;
                }

                .form-control,
                .form-control:focus {
                    position: relative;
                    width: 100%;
                    line-height: 30px;
                    padding: 10px 100px 10px 20px;
                    height: 60px;
                    display: block;
                    font-family: 'Outfit', sans-serif;
                    font-size: 14px;
                    background: transparent;
                    color: #1b1b1b;
                    border-radius: 30px;
                    border: 1px solid #f5b754;
                    transition: all 300ms ease;
                }

                .form-control:hover {
                    box-shadow: 0 0 0 1px #f5b754;
                }

                .form-control:focus {
                    border-color: #f5b754;
                    box-shadow: 0 0 0 2px #f5b754;
                }


                .form-group {
                    margin-bottom: 1.5rem;
                }

                .form-row {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 1.5rem;
                }

                .form-col {
                    flex: 1;
                    min-width: 0;
                }


                .card-header {
                    background-color: #1b1b1b;
                    border-bottom: 1px solid #dee2e6;
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #f5b754;
                }

                .card-body {
                    background-color: #1b1b1b;
                    padding: 2rem;
                }

                .btn-outline-success {
                    border-color: #28a745;
                    color: #28a745;
                    border-radius: 0.25rem;
                }

                .btn-outline-success:hover {
                    background-color: #28a745;
                    color: #fff;
                    box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.1);
                }

                label,
                strong {
                    font-weight: bold;
                    color: #fffffffb !important;
                }
            </style>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
