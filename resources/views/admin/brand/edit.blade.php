@extends('layouts.admin')
@section('title', 'Create Brand')
@section('content')
<style>
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
</style>
    <div class="container">
        <div style="top:50%; right:50%; transform: translate(50%, -50%); position:absolute width:700px;" class="card row">
            <div class="card-header" style="color: #f5b754">
                Marka Düzenleme Formu
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route("admin.brand.update",$brand->id)}}">
                    @method("PUT")
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Marka Adı:</label>
                        <input type="text" value="{{$brand->name}}" class="form-control" id="name" name="name"
                            placeholder="Marka adını giriniz" required="">
                    </div>
                    <div class="mb-4 row">
                        <label class="form-label" for="image">Marka Logosu:</label>
                        <div>
                            <img id="image" src="{{ url($brand->handleImagePath($brand->image)) }}" class="rounded" alt="&nbsp;&nbsp;Logo Ekleyiniz"
                                style="width: 150px; height: 120px; border: 1px solid rgb(245, 183, 84);">
                            <input class="form-control" type="file" id="file-upload" name="image" style="width:320px; margin-top: 20px;"
                                accept=".jpg, .jpeg, .png"></input>
                            <script>
                                document.getElementById('file-upload').addEventListener('change', function() {
                                    var file = this.files[0]; // Seçilen dosyayı alalım
                                    var reader = new FileReader(); // Dosya okuyucu oluşturalım

                                    reader.onload = function(e) {
                                        document.getElementById('image').src = e.target
                                        .result; // Resmin src'sine dosyanın verisini atayalım
                                    }

                                    reader.readAsDataURL(file); // Dosyayı okuyalım ve base64 formatında alalım
                                });
                            </script>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-success rounded-pill" style="width: 180px; height:45px; border:2px solid #198754; font-weight:bold;">Marka Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
