@extends('layouts.app')

@section('content')
<style>
    .btn{
        height: 50px;
        width: 200px;
        align-content: center;
    }
    body{
        height: 100vh;
        background-color: #1b1b1b;
    }
    .card{
        background-color: #1b1b1b;
        border: 1px solid white;
    }
    </style>
<div class="container">
    <div class="row">
        <div style="position:absolute; top:50%; right:50%; transform:translate(50%,-50%)" class="col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-center">{{ __('Dashboard') }}</div>
                <div class="d-flex justify-content-between" style="margin-top:50px; margin-left:50px; margin-right:50px">
                    <a href="{{ route("admin.brand.create") }}" target="_blank" class="btn btn-success">
                        BRAND CREATE
                    </a>
                    <a href="{{ route("auth.brand.list") }}" target="_blank" class="btn btn-primary">
                        BRAND LİST
                    </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="d-flex justify-content-center"><strong style="color: #f5b754;">{{ __('You are logged in!') }}</strong></div>
                </div>
                <div class="d-flex justify-content-between" style="margin-bottom:50px; margin-right:50px; margin-left:50px;">
                    <a href="{{ route("admin.car.create") }}" target="_blank" class="btn btn-success">
                        CAR CREATE
                    </a>
                    <a href="{{ route("auth.car.list") }}" target="_blank" class="btn btn-primary">
                        CAR LİST
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
