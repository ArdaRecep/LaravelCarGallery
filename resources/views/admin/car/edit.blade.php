@extends('layouts.admin')
@section('title', 'Create Car')
@section('content')
    <div style="height: 100vh;" class="container d-flex align-items-center justify-content-center">
        <div style="width: 700px;" class="card row">
            <div class="card-header">
                Araba Güncelleme Formu
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{ route('admin.car.update', $car->slug) }}">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Marka:</label>
                        <select class="form-control" id="brand_id" name="brand_id" rows="3">
                            @foreach ($all_brands as $brand)
                            <option value="{{ $brand->id }}"
                                @if ($car->brand_id == $brand->id)
                                selected
                                @endif>
                                {{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Model:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{$car->name}}"
                            placeholder="Model giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Video:</label>
                        <input type="text" value="{{$car->url}}" class="form-control" id="url" name="url"
                            placeholder="Url giriniz">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat:</label>
                        <input type="text" value="{{$car->price}}" class="form-control" id="price" name="price"
                            placeholder="Fiyat giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Açıklama:</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Açıklama giriniz">{{$car->description}}</textarea>
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label" for="image">Araç Resmi:</label>
                        <div>
                            <div>
                            <img id="image" src="{{ url($car->handleImagePath($car->image)) }}" class="rounded" alt="&nbsp;&nbsp;Resim Ekleyiniz" style="width: 380px; height: 190px;">
                                <input type="hidden" name="current_image" value="{{$car->image}}">
                        </div>
                            <input style="margin-top: 10px;" type="file" id="file-upload" name="image" accept=".jpg, .jpeg, .png"></input>
                            <script>
                                document.getElementById('file-upload').addEventListener('change', function() {
                                    var file = this.files[0]; // Seçilen dosyayı alalım
                                    var reader = new FileReader(); // Dosya okuyucu oluşturalım

                                    reader.onload = function(e) {
                                        document.getElementById('image').src = e.target.result; // Resmin src'sine dosyanın verisini atayalım
                                    }

                                    reader.readAsDataURL(file); // Dosyayı okuyalım ve base64 formatında alalım
                                });
                                </script>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-outline-success">Araba güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
