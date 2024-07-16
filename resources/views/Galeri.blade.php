<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Galeri</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Styles -->
        <style>

    .galeri img {
      width: 400px;
      height: 250px;
      transition: transform 0.3s;
      margin-top: 30px;
    }
    .galeri img:hover {
      transform: scale(1.05);
    }
        </style>
    </head>
    <body>
        <div class="container mt-4">
            <h2 class="text-center">Resim Galerisi</h2>
            <div class="row container">
              <!-- Galeri öğeleri -->
              <div class="col galeri">
                {{-- <a href="{{route('carname', ['carname' => $carname->carname])}}"><img src="1.jpg" class="rounded" alt="Resim 1"></a> --}}
              </div>
              <div class="col galeri">
                <a href=""><img src="2.jpg" class="rounded" alt="Resim 2"></a>
              </div>
              <div class="col galeri">
                <a href=""><img src="3.jpg" class="rounded" alt="Resim 3"></a>
              </div>
              <div class="col galeri">
                <a href=""><img src="4.jpg" class="rounded" alt="Resim 4"></a>
              </div>
              <div class="col galeri">
                <a href=""><img src="5.jpg" class="rounded" alt="Resim 5"></a>
              </div>
              <div class="col galeri">
                <a href=""><img src="6.jpg" class="rounded" alt="Resim 6"></a>
              </div>
            </div>
          </div>
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    </body>
</html>
