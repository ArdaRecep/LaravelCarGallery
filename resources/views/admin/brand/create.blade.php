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
        .navbar {
        position: absolute!important;
        width: 100vw;
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
                    <div class="mb-3 row">
                        <label class="form-label" for="image">Marka Logosu:</label>
                        <div>
                            <img id="image" class="rounded" alt="&nbsp;&nbsp;Logo Ekleyiniz"
                                style="width: 150px; height: 120px; display: none;">
                            <input type="file" id="file-upload" name="image" style="margin-left: 20px;"
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
                        <button type="submit" class="btn btn-outline-success">Marka Ekle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
