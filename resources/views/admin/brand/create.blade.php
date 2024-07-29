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

        /* Uyarı kutusuna animasyonu uygula */
        .alert {
            animation: hideAlert 3.4s forwards;
        }
</style>
    <div style="height: 100vh;" class="container d-flex align-items-center justify-content-center">
        <div style="width: 700px;" class="card row">
            <div class="card-header">
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
                    <div class="mb-3">
                        <label for="content" class="form-label">Açıklama:</label>
                        <textarea class="form-control" id="content" name="content" rows="3"
                            placeholder="Marka hakkında açıklama giriniz"></textarea>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label" for="image">Marka Logosu:</label>
                        <div>
                            <img id="image" src="" class="rounded" alt="&nbsp;&nbsp;Logo Ekleyiniz"
                                style="width: 150px; height: 120px;">
                            <input type="file" id="file-upload" name="image" style="margin-left: 20px;"
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
                        <button type="submit" class="btn btn-outline-success">Marka Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
