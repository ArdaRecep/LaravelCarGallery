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
        <h2 class="text-center">Arabalar</h2>
        <div class="row container">
            <!-- Galeri öğeleri -->
            @foreach ($cars as $car)
            <div class="col galeri">
                <a href="{{ route("front.car.show", ['slug' => $car->slug]) }}"><img src="{{ url($car->handleImagePath($car->image)) }}" class="rounded" alt="Resim 1"></a>
            </div>
            @endforeach
        </div>
    </div>
@endsection
