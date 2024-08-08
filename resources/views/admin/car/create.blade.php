@extends('layouts.admin')
@section('title', 'Create Car')
@section('content')
<style>
    img {
        width: 160px;
        height: 160px;
        margin: 2px;
        border-radius: 0.25rem;
        box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.1);
    }
    .form-control, .form-control:focus {
        border-color: #ced4da;
        box-shadow: none;
        border-radius: 0.25rem;
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
        background-color: #f8f9fa;
        border-bottom: 1px solid #dee2e6;
        font-size: 1.5rem;
        font-weight: bold;
        color: #343a40;
    }
    .card-body {
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
    .iframe-wrapper {
        position: relative;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio */
    }
    .iframe-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
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
    .btn-play{
        height: 37.6px;
    }

    .modal {
            display: none;
            /* Gizli varsayılan */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.8);
            /* Gri arka plan */
        }


        .modal-content img {
            width: 700px;
            height: 500px;
        }
        .modal-content{
            width: auto!important;
            height: auto!important;
            border: none!important;
            background: none!important;
        }

        .close {
            color: #fff;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        .next, .prev
        {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -50px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;

        }
        .next {right: 0; margin-right: 12px;} .prev{left: 0; margin-left: 12px;}

        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
</style>
<div class="container">
    <div class="card">
        <div class="card-header">
            Araba Ekleme Formu
        </div>
        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('admin.car.store') }}">
                @csrf
                <div class="form-row">
                    <!-- 1. Sütun -->
                    <div class="form-col col-md-4">
                        <div class="form-group">
                            <label for="brand_id" class="form-label">Marka:</label>
                            <select class="form-control" id="brand_id" name="brand_id">
                                <option selected disabled>Lütfen Marka Seçiniz</option>
                                @foreach ($all_brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label">Model:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Model giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="year" class="form-label">Yıl:</label>
                            <input type="text" class="form-control" id="year" name="year" placeholder="Yıl giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="price" class="form-label">Fiyat(₺):</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="Fiyat giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="fuel" class="form-label">Yakıt Tipi:</label>
                            <input type="text" class="form-control" id="fuel" name="fuel" placeholder="Yakıt Tipi giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="drive_type" class="form-label">Çekiş Türü:</label>
                            <input type="text" class="form-control" id="drive_type" name="drive_type" placeholder="Çekiş Bilgisi giriniz" required>
                        </div>
                        <div class="image-container-wrapper">
                            <div class="form-group">
                                <label class="form-label" for="file-upload">Kapak Resmi:</label>
                                <input class="form-control mb-2"
                                type="file" id="file-upload" name="thumbnail" accept=".jpg, .jpeg, .png">
                                <div class="d-flex align-items-center">
                                    <label for="file-upload">
                                    <img id="image" hidden style="width: 300px; height:240px;" alt="Kapak Resmi" class="img-thumbnail">
                                </label>
                                </div>

                                <script>
                                    document.getElementById('file-upload').addEventListener('change', function() {
                                        var file = this.files[0];
                                        var reader = new FileReader();

                                        reader.onload = function(e) {
                                            var thumbnail=document.getElementById('image')
                                            thumbnail.src = e.target.result;
                                            thumbnail.hidden = false;
                                        }

                                        reader.readAsDataURL(file);
                                    });
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Sütun -->
                    <div class="form-col col-md-4">
                        <div class="form-group">
                            <label for="mass" class="form-label">Ağırlık(kg):</label>
                            <input type="text" class="form-control" id="mass" name="mass" placeholder="Ağırlık giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="doors" class="form-label">Kapı Sayısı:</label>
                            <input type="text" class="form-control" id="doors" name="doors" placeholder="Kapı Sayısı giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="seats" class="form-label">Koltuk Sayısı:</label>
                            <input type="text" class="form-control" id="seats" name="seats" placeholder="Koltuk Sayısı giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="hp" class="form-label">Beygir(hp):</label>
                            <input type="text" class="form-control" id="hp" name="hp" placeholder="Beygir Gücü giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="top_speed" class="form-label">Maksimum Hız(km/h):</label>
                            <input type="text" class="form-control" id="top_speed" name="top_speed" placeholder="Maksimum Hız giriniz" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="images">Araç Resimleri:</label>
                            <div class="d-flex flex-column">
                                <input class="form-control mb-2" type="file" id="images" name="images[]" accept=".jpg, .jpeg, .png" multiple>
                                <div id="image-container" class="image-preview-container">
                                    <!-- Görüntü önizlemeleri burada görünecek -->

                                    <div id="myModal" class="modal justify-content-center align-items-center">
                                        <div class="modal-content">
                                            <span class="close"></span>
                                            <img id="modalImage" src="" alt="Görsel">
                                            <a class="prev" id="prev" onclick="changeImage(-1)">&#10094;</a>
                                            <a class="next" id="next" onclick="changeImage(+1)">&#10095;</a>
                                        </div>
                                    </div>
                                </div>
                                <script>
                                    // Modal ilgili değişkenler
                                    var modal = document.getElementById("myModal");
                                    var modalImg = document.getElementById("modalImage");
                                    var currentIndex = 0;
                                    var container = document.getElementById('image-container');
                                    var navbar = document.getElementById('navbar');

                                    function showModal() {
                                        navbar.style.display = "none";
                                        modal.style.display = "block";
                                        modalImg.src = container.querySelectorAll('.gallery-image')[currentIndex].src;
                                        modal.style.display = "flex";
                                        modal.classList.add("justify-content-center align-items-center");
                                    }

                                    function hideModal() {
                                        navbar.style.display = "flex";
                                        modal.style.display = "none";
                                    }

                                    function changeImage(step) {
                                        var images = container.querySelectorAll('.gallery-image');
                                        currentIndex += step;
                                        if (currentIndex > images.length-1) {
                                            currentIndex = images.length-1;
                                        } else if (currentIndex < 0) {
                                            currentIndex = 0;
                                        }
                                        modalImg.src = images[currentIndex].src;
                                    }

                                    function addClickEventsToImages() {
                                        var images = container.querySelectorAll('.gallery-image');
                                        images.forEach((img, index) => {
                                            img.onclick = function() {
                                                currentIndex = index;
                                                showModal();
                                            }
                                        });
                                    }

                                    document.addEventListener('DOMContentLoaded', addClickEventsToImages);

                                    document.getElementById('images').addEventListener('change', function() {
                                        var files = this.files;

                                        // Önceki resimleri kaldır
                                        container.querySelectorAll('.gallery-image').forEach(img => img.remove());

                                        for (var i = 0; i < files.length; i++) {
                                            var file = files[i];
                                            var reader = new FileReader();

                                            reader.onload = function(e) {
                                                var img = document.createElement('img');
                                                img.src = e.target.result;
                                                img.style.objectFit = 'cover';
                                                img.classList.add("gallery-image");
                                                container.appendChild(img);
                                            }
                                            reader.readAsDataURL(file);
                                        }

                                        // Yeni eklenen resimlere tıklama olaylarını ekle
                                        setTimeout(addClickEventsToImages, 100); // Küçük bir gecikme ile olayları ekle
                                    });

                                    document.querySelector(".close").onclick = function() {
                                        hideModal();
                                    }

                                    window.onclick = function(event) {
                                        if (event.target === modal) {
                                            hideModal();
                                        }
                                    }
                                </script>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Sütun -->
                    <div class="form-col col-md-4">
                        <div class="form-group">
                            <label for="transmission" class="form-label">Vites Tipi:</label>
                            <input type="text" class="form-control" id="transmission" name="transmission" placeholder="Vites Türü giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="gear" class="form-label">Vites Sayısı:</label>
                            <input type="text" class="form-control" id="gear" name="gear" placeholder="Vites Sayısı giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="type" class="form-label">Kategori:</label>
                            <input type="text" class="form-control" id="type" name="type" placeholder="Kasa Türünü giriniz" required>
                        </div>
                        <div class="form-group">
                            <label for="description" class="form-label">Açıklama:</label>
                            <textarea class="form-control" style="height: 130px" id="description" name="description" placeholder="Açıklama giriniz"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileInput" class="form-label">Video yükleyin (MP4):</label>
                            <input type="file" id="fileInput" name="url" class="form-control mb-4" accept="video/mp4">

                            <div class="video-wrapper" id="t">
                                <video id="videoElement" controls width="100%" style="display: none;">
                                    Your browser does not support the video tag.
                                </video>
                            </div>

                            <script>
                                // Handle file input for video playback
                                document.getElementById('fileInput').addEventListener('change', function(event) {
                                    var file = event.target.files[0];
                                    var videoElement = document.getElementById('videoElement');
                                    var videoWrapper = document.getElementById('t');

                                    if (file) {
                                        if (file.type === 'video/mp4') {
                                            var url = URL.createObjectURL(file);
                                            videoElement.src = url;
                                            videoElement.style.display = 'block';
                                            videoElement.play(); // Start playing the video automatically
                                            videoWrapper.style.display = 'block';
                                        } else {
                                            console.error('Lütfen sadece MP4 dosyası seçin.');
                                            videoWrapper.style.display = 'none';
                                        }
                                    }
                                });

                                // Handle the case where the file input is cleared or canceled
                                document.getElementById('fileInput').addEventListener('click', function() {
                                    var videoElement = document.getElementById('videoElement');
                                    var videoWrapper = document.getElementById('t');

                                    // Ensure the video element's visibility and source are managed correctly
                                    if (videoElement.src && !document.getElementById('fileInput').files.length) {
                                        videoElement.style.display = 'block'; // Keep video visible if a file is already loaded
                                        videoWrapper.style.display = 'block'; // Ensure video wrapper is visible
                                    }
                                });
                            </script>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-outline-success">Araba Ekle</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
