@extends('layouts.front')
@section('title', 'All Cars')
@section('style')
<style>
    .galeri img {
        width: 200px;
        height: 200px;
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
        <h2 class="text-center">Markalar</h2>
        <div class="row container">
            <!-- Galeri öğeleri -->
            @foreach ($brands as $brand)
            <div class="col galeri">
                <a href="#"><img src="{{ url($brand->image) }}" class="rounded" alt="Resim 1"></a>
            </div>
            @endforeach
        </div>
    </div>
@endsection

