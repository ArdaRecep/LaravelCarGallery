<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    @yield('style')
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbar">
        <div class="container-fluid">
            <a class="navbar-brand">Galeri</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link dropdown-toggle" role="button" aria-expanded="false">
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

    @yield('content')
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
