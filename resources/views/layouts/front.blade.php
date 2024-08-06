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

        .dropdown-menu {
            display: none;
            overflow: hidden;
        }

        .ortala {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 20px
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
                        <a href="{{ route('front.index') }}" class="nav-link " role="button" aria-expanded="false">
                            Arabalar
                        </a>
                    <li class="nav-item dropdown">
                        <a href="{{ route('front.brand.index') }}" class="nav-link" role="button"
                            aria-expanded="false">
                            Markalar
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>
        window.addEventListener('load', function() {
           var navbar = document.getElementById('navbar');
           navbar.style.top="0px";
       });
   </script>
    <script>
        var oncekiScroll = 0;
        var navbar = document.getElementById('navbar');
        navbar.style.transition="top 0.3s ease-in-out";
        window.addEventListener('scroll', function() {
            navbar.style.opacity = '0.8';

            var mevcutScroll = document.documentElement.scrollTop;
            if (mevcutScroll > oncekiScroll) {
                navbar.style.top="-56px";
            } else {
                navbar.style.top="0px";
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
