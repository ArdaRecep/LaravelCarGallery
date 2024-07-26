<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
        @yield('style')
        <style>
            textarea{
                max-height: 300px;
            }
            .dropdown:hover .dropdown-menu {
                display: block;
                animation: fadeIn 0.3s ease-in-out forwards;
            }

            .dropdown-menu {
                display: none;
                margin-top: 0;
                opacity: 0;
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                }
                to {
                    opacity: 1;
                }
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand">Galeri</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route("front.index") }}" id="navbarDropdownMenuLinkCar" role="button" aria-expanded="false">
                                Araba
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkCar">
                                <li><a class="dropdown-item" href="{{ route("admin.car.create") }}">Araba Ekle</a></li>
                                <li><a class="dropdown-item" href="#">Araba Düzenle</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route("front.brand.index") }}" id="navbarDropdownMenuLinkBrand" role="button" aria-expanded="false">
                                Marka
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkBrand">
                                <li><a class="dropdown-item" href="{{ route("admin.brand.create") }}">Marka Ekle</a></li>
                                <li><a class="dropdown-item" href="#">Marka Düzenle</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
