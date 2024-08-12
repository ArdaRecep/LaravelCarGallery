@extends('layouts.admin')
@section('title', 'Create Brand')
@section('content')
<style>
            @keyframes hideAlert {
            45%{
                opacity: 1;
            }

            90% {
                opacity: 0;
                display: none;
            }
            100% {
                opacity: 0;
                display: none;
            }
        }
        body {
            background-color: #1b1b1b;
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

        .form-label {
            font-weight: bold;
            color: #343a40;
        }

        .custom-file-input {
            border-radius: 0.25rem;
        }

        .custom-file-label::after {
            content: 'Dosya Seç';
        }

        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }

        .image-preview-container img {
            max-width: 100%;
            height: auto;
            border-radius: 0.25rem;
            box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.1);
        }

        .form-control-file {
            border-radius: 0.25rem;
        }
        .image-container-wrapper {
            display: flex;
            flex-direction: column;
            gap: 10px;
            position: relative;
        }

        .form-col.image-col {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .form-col.image-col .image-preview-container {
            flex: 1;
        }

        input::placeholder {
            color: #ffffffc5 !important;
        }

        input {
            color: #ffffff !important;
        }
        textarea::placeholder{
            color: #ffffffc5 !important;
        }
        textarea{
            color: #ffffff !important;
        }
        label{
            color: #fffffffb!important;
        }

        /* Uyarı kutusuna animasyonu uygula */
        .alert {
            animation: hideAlert 3.4s forwards;
        }
        .navbar {
        position: absolute!important;
        width: 100vw;
    }
</style>
    <div style="height: 100vh;" class="container d-flex align-items-center justify-content-center">
        <div style="width: 700px;" class="card row">
            <div class="card-header" style="color: #f5b754">
                Marka Ekleme Formu
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="http://localhost:8000/brand/store">
                    @csrf
                    <div class="mb-3">
                        @session('error')
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endsession
                        <label for="name" class="form-label">Marka Adı:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Marka adını giriniz" required="">
                    </div>
                    <div class="mb-4 row">
                        <label class="form-label" for="image">Marka Logosu:</label>
                        <div>
                            <img id="image" class="rounded" alt="&nbsp;&nbsp;Logo Ekleyiniz"
                                style="width: 150px; height: 120px; display: none; border: 1px solid #f5b754;">
                            <input class="form-control" type="file" id="file-upload" name="image" style="width:320px; margin-left: 20px;"
                                accept=".jpg, .jpeg, .png"></input>
                            <script>
                                var image = document.getElementById('image')
                                document.getElementById('file-upload').addEventListener('change', function() {
                                    var file = this.files[0];
                                    var reader = new FileReader();

                                    reader.onload = function(e) {
                                        image.src = e.target.result;
                                        image.style.display = "block";
                                        image.style.marginBottom = "15px";
                                    }

                                    reader.readAsDataURL(file);
                                });
                            </script>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success rounded-pill" style="width: 150px; height:45px; border:2px solid #198754; font-weight:bold;">Marka Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
