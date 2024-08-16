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
    <style>

.form-control {
            padding: 10px 20px 10px 20px !important;
        }

        .form-control[type=file] {
            padding-top: 14px !important;
        }

        textarea {
            max-height: 300px;
        }

        body {
            height: 100vh;
        }

        .navbar {
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
            animation: fadeIn 0.8s ease-in-out;
        }

        .ortala {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px
        }

        .dropdown-menu {
            display: none;
            overflow: hidden;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                max-height: 0;
            }

            to {
                opacity: 1;
                max-height: 200px;
            }
        }
            /* Genel form input stili */
    body {
        background-color: #1b1b1b;
        height: 100%!important;
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
    .form-control:hover{
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
        color:#f5b754;
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
    input::placeholder {
        color: #ffffffc5 !important;
    }

    input {
        color: #ffffff !important;
    }
    label{
        color: #fffffffb!important;
    }
    textarea::placeholder{
            color: #ffffffc5 !important;
        }
        textarea{
            color: #ffffff !important;
        }
        label{
            color: #fffffffb!important;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" aria-expanded="false">
                                Araba
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route("auth.car.list") }}">
                                        Arabalar
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.car.create') }}">
                                        Araba Ekle
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <id="navbarDropdown" class="nav-link dropdown-toggle" role="button" aria-expanded="false" >
                                Marka
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route("auth.brand.list") }}">
                                        Markalar
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.brand.create') }}">
                                        Marka Ekle
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-right:100px;">
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
            </div>
        </nav>
        <script>
            window.addEventListener('load', function() {
                var navbar = document.getElementById('navbar');
                navbar.style.top = "0px";
            });
        </script>
        <script>
            var oncekiScroll = 0;
            var navbar = document.getElementById('navbar');
            var mevcutScroll = -1;
            navbar.style.transition = "top 0.3s ease-in-out";
            window.addEventListener('scroll', function() {
                navbar.style.opacity = '0.8';

                mevcutScroll = document.documentElement.scrollTop;
                if (mevcutScroll > oncekiScroll) {
                    // Aşağı kaydırma
                    navbar.style.top = "-56px";
                } else {
                    // Yukarı kaydırma
                    navbar.style.top = "0px";
                }

                if (mevcutScroll <= 0) {
                    oncekiScroll = 0;
                } else {
                    oncekiScroll = mevcutScroll;
                }
                if (mevcutScroll == 0) {
                    navbar.style.opacity = '1';
                }

            });
        </script>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script src="{{ asset("js/sweetalert2.js") }}"></script>
    @foreach ($errors->keys() as $field)
    @if ($errors->has($field))
        <script>
            Swal.fire({
                title: '<strong>{{ $errors->first($field) }}</strong>',
                icon: 'error',
            });
        </script>
    @endif
@endforeach
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
