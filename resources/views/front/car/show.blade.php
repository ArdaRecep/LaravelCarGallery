@extends('layouts.front')
@section('title', 'Car Details')
@section('style')
    <style>
        .a {
            width: 500px;
            height: 300px;
            margin-top: 30px;
        }

        .s {
            width: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="row">
            <img src="{{ url($car->image) }}" class="rounded a" alt="Araba Fotoğrafı">
            <div class="col">
                <div class="mt-5">
                    <h2>{{ $car->name }}</h2>
                    <br>
                    <p><strong>Fiyatı:</strong> {{ $car->price }}</p>
                    <div class="d-flex">
                        <strong class="mt-2">Açıklama:</strong>
                        <textarea class="form-control" style="margin-left:10px; width: 300px;">{{$car->description}}</textarea>
                    </div>
                    <p>
                        <strong>Markası:</strong>
                        {{ $car->brand->name}}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
