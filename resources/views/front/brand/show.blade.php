@extends('layouts.front')
@section('title', 'Car Details')
@section('style')
    <style>
        .a {
            width: 300px;
            height: 300px;
            margin-top: 30px;
            margin-right: 150px;
        }

        .s {
            width: auto;
        }
    </style>
@endsection
@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="row">
            <img src="{{ url($brand->handleImagePath($brand->image)) }}" class="rounded a" alt="Araba Fotoğrafı">
            <div class="col">
                <div class="mt-5">
                    <h2>{{ $brand->name }}</h2>
                    <br>
                    <div class="d-flex">
                        <strong class="mt-2">Açıklama:</strong>
                        <textarea class="form-control" style="margin-left:10px; width: 300px;">{{ $brand->content }}</textarea>
                    </div>
                    <div class="d-flex justify-content-between pt-3">
                        <button type="button" class="btn btn-outline-success" style="width: 100px">
                            <i class="fas fa-edit"></i> Edit
                        </button>
                        <form method="POST" action="{{route("admin.brand.delete", $brand->id)}}">
                            @method("DELETE")
                            @csrf
                        <button type="submit" class="btn btn-outline-danger" style="width: 100px">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
