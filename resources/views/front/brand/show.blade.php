@extends('layouts.front')
@section('title', 'Car Details')
@section('style')

@endsection
@section('content')
<style>
    .a {
        width: 300px;
        height: 300px;
        margin-right: 150px;
    }

    .navbar {
        position: absolute!important;
        width: 100vw;
    }
</style>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="row">
            <img src="{{ url($brand->handleImagePath($brand->image)) }}" class="rounded a" alt="Marka Logosu">
            <div class="col">
                <div class="mt-5">
                    <h2 class="d-flex justify-content-center">{{ $brand->name }}</h2>
                    <br>
                    <div class="d-flex justify-content-between pt-3" style="width: 250px">
                        <form method="GET" action="{{ route('admin.brand.edit', $brand->id) }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-success" style="width: 100px">
                                <i class="fas fa-edit"></i> Edit
                            </button>
                        </form>
                        <form method="POST" action="{{ route('admin.brand.delete', $brand->id) }}">
                            @method('DELETE')
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
