@extends('layouts.admin')
@section('title', 'Create Brand')
@section('content')
    <div style="height: 100vh;" class="container d-flex align-items-center justify-content-center">
        <div style="width: 700px;" class="card row">
            <div class="card-header">
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
                    <div class="mb-3 row">
                        <label class="form-label" for="image">Marka Logosu:</label>
                        <div>
                            <img id="image" src="{{ url($brand->handleImagePath($brand->image)) }}" class="rounded" alt="&nbsp;&nbsp;Logo Ekleyiniz"
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
                        <button type="submit" class="btn btn-outline-success">Marka Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
