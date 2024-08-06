@extends('layouts.front')
@section('title', 'All Cars')
@section('style')
    <style>
        .i {
            width: 400px;
            height: 250px;
            transition: transform 0.3s;
            margin-top: 10px;
            margin-right: 10px;
        }

        .galeri img:hover {
            transform: scale(1.05);
        }

        .galeri a {
            display: contents;
        }
    </style>
@endsection
<div style="height: 100vh;">
    @section('content')
        <div class="container mt-4">
            <h2 class="text-center">Arabalar</h2>
            <div class="row container">
                <div class="col galeri" style="display: contents">
                    <!-- Galeri öğeleri -->
                    @foreach ($cars as $car)
                        <a href="{{ route('front.car.show', ['slug' => $car->slug]) }}">
                            <img src="{{ url($car->thumbnail) }}" class="rounded i"
                                alt="{{ $car->brand->name." ".$car->slug }}" />
                        </a>
                    @endforeach
                    <div class="d-flex justify-content-center align-items-center" style="height: 250px; width: 400px;">
                        <a href="{{ route('admin.car.create') }}">
                            <img class="rounded i" src="carplus3.png" alt=""style="height: 100px; width: 150px;" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
