{{-- @extends('layouts.front')
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
        .f{
            height: 100px;
            width: 100px;
            transition: transform 0.3s;
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
            </div>
        </div>
    </div>
@endsection --}}



@extends('layouts.master')
@section('title', 'All Brands')


@section('content')
    <section class="banner-header section-padding bg-img" data-overlay-dark="6" data-background="img/slider/22.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1>Bra<span>nds</span></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->
    <div class="line-vr-section"></div>
    <!-- Car Types -->
    <section class="car-types4 section-padding">
        <div class="container">
            <div class="row">
                @foreach ($brands as $brand)
                    <div class="col-lg-4 col-md-6 mb-45">
                        <a href="#" style="width: 376px!important; height: 376px !important;">
                            <div class="item">

                                <div style="z-index: 2" class="info">
                                    <h2 class="title">{{ $brand->name }}</h2>
                                </div>
                                <div class="img d-flex align-items-center justify-content-center"
                                    style="height: 376px !important;">
                                    <img style="width: 336px!important; height: 336px !important;"
                                        src="{{ url($brand->handleImagePath($brand->image)) }}" class="img-fluid"
                                        alt="{{ $brand->name }}">
                                </div>
                                <div class="curv-butn icon-bg">
                                    <div class="icon"> <i class="ti-arrow-top-right"></i> </div>

                                    <div class="br-left-top">
                                        <svg viewbox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                    <div class="br-right-bottom">
                                        <svg viewbox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#1b1b1b"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
