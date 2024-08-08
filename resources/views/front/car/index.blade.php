{{-- @extends('layouts.front')
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
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.master')
@section('title', 'All Cars')


@section('content')
<section class="banner-header section-padding bg-img" data-overlay-dark="6" data-background="1.jpg">
    <div class="v-middle">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h6>Select Your Car</h6>
                    <h1>Luxury <span>Car Gallery</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="line-vr-section"></div>
<section class="cars3 section-padding">
    <div class="container">
        <div class="row">
            @foreach ($cars as $car)
            <div class="col-lg-4 col-md-6 mb-60">
                <div class="item">
                    <div class="fiyat">
                        <a href="{{ route('front.car.show', ['slug' => $car->slug]) }}" class="br">
                            <div class="year">{{ number_format($car->price, 0, ',', '.') }} ₺</div>
                        </a>
                        <div class="br-left-top">
                            <svg viewbox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                            </svg>
                        </div>
                        <div class="br-right-bottom">
                            <svg viewbox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-11 h-11">
                                <path d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z" fill="#1b1b1b"></path>
                            </svg>
                        </div>
                    </div>
                    <a href="{{ route('front.car.show', ['slug' => $car->slug]) }}" class="img"> <img src="{{url($car->thumbnail)}}" alt="" class="img-fluid">
                        <div class="bottom-fade"></div>
                        <div class="arrow"> <i class="ti-arrow-right"></i> </div>
                    </a>
                    <div class="info">
                        <div class="title"><a href="{{ route('front.car.show', ['slug' => $car->slug]) }}">{{$car->brand->name." ".$car->name}}</a></div>
                        <div class="details">
                            <span><i class="omfi-door"></i> {{$car->seats}} Seats</span>
                            <span><i class="omfi-transmission"></i> {{$car->transmission}}</span>
                            <span><i class="fa-light fa-calendar-days"></i> {{$car->year}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
