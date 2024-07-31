@extends('layouts.front')
@section('title', 'All Cars')
@section('style')
    <style>
        .i {
            width: 200px;
            height: 200px;
            transition: transform 0.3s;
            margin-top: 30px;
            margin-right: 75px;
        }

        .galeri img:hover {
            transform: scale(1.05);
        }

        .galeri a {
            display: contents;
        }
    </style>
@endsection
@section('content')
    <div class="container mt-4">
        <h2 class="text-center">Markalar</h2>
        <div class="row container">
            <!-- Galeri öğeleri -->
            <div class="col galeri" style="display: contents">
                <!-- Galeri öğeleri -->
                @foreach ($brands as $brand)
                    <a href="{{ route('front.brand.show', ['id' => $brand->id]) }}">
                        <img src="{{ url($brand->handleImagePath($brand->image)) }}" class="rounded i"
                            alt="{{ $brand->name }}" />
                    </a>
                @endforeach
                <div class="d-flex justify-content-center align-items-center i">
                    <a href="{{ route('admin.brand.create') }}">
                        <img class="" src="brandplus2.png"
                            alt=""style="height: 100px; width: 100px;" />
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
