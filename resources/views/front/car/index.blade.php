@extends('layouts.front')
@section('title', 'All Cars')
@section('style')
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
@endsection
@section('content')
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
@endsection
