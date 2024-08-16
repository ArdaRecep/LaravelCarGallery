@extends('layouts.app')

@section('content')
<style>

    /* Genel form input stili */
    body {
        background-color: #1b1b1b;
        height: 100%!important;
    }

    .form-control,
    .form-control:focus {
        position: relative;
        width: 100%;
        line-height: 30px;
        padding: 10px 100px 10px 20px;
        height: 60px;
        display: block;
        font-family: 'Outfit', sans-serif;
        font-size: 14px;
        background: transparent;
        color: #1b1b1b;
        border-radius: 30px;
        border: 1px solid #f5b754;
        transition: all 300ms ease;
    }
    .form-control:hover{
        box-shadow: 0 0 0 1px #f5b754;
    }
    .form-control:focus {
        border-color: #f5b754;
        box-shadow: 0 0 0 2px #f5b754;
    }


    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
    }

    .form-col {
        flex: 1;
        min-width: 0;
    }


    .card-header {
        background-color: #1b1b1b;
        border-bottom: 1px solid #dee2e6;
        font-size: 1.5rem;
        font-weight: bold;
        color: #343a40;
    }

    .card-body {
        background-color: #1b1b1b;
        padding: 2rem;
    }

    .btn-outline-success {
        border-color: #28a745;
        color: #28a745;
        border-radius: 0.25rem;
    }

    .btn-outline-success:hover {
        background-color: #28a745;
        color: #fff;
        box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.1);
    }
    input::placeholder {
        color: #ffffffc5 !important;
    }

    input {
        color: #ffffff !important;
    }
    label{
        color: #fffffffb!important;
    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="color: #f5b754;">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-outline-success rounded-pill" style="width: 120px; border-width:2px; font-weight:bold;">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" style="color:#f5b754">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
