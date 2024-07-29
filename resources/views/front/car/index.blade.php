@extends('layouts.front')
@section('title', 'All Cars')
@section('style')
    <style>
        .galeri img {
            width: 400px;
            height: 250px;
            transition: transform 0.3s;
            margin-top: 10px;
            margin-right: 10px;
        }

        .galeri img:hover {
            transform: scale(1.05);
        }.galeri a{
            display: contents;
        }
    </style>
@endsection
<div style="height: 100vh;">
    @section('content')
        <div class="container mt-4">
            <h2 class="text-center">Arabalar</h2>
            <div class="row container">
                <div class="col galeri">
                    <!-- Galeri öğeleri -->
                    @foreach ($cars as $car)
                        <a href="{{ route('front.car.show', ['slug' => $car->slug]) }}">
                            <img src="{{ url($car->handleImagePath($car->image)) }}" class="rounded" alt="{{$car->slug}}"/>
                        </a>
                    @endforeach
                    <a href="{{ route('admin.car.create') }}">
                        <img class="rounded" src="carplus3.png"
                            alt=""style="height: 100px!important; width: 150px!important; margin-left: 135px!important;" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
