{{-- @extends('layouts.front')
@section('title', 'Car Details')
@section('style')
    <style>
        .a {
            width: 500px;
            height: 300px;
            margin-top: 30px;
            margin-right: 150px;
        }

        .s {
            width: auto;
        }
    </style>
@endsection
@section('content')
    <style>
        .uppercase {
            text-transform: uppercase;
        }

        .er {
            width: 160px;
            height: 160px;
            margin: 2px;
            border-radius: 0.25rem;
            box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.1);
            object-fit: cover;
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

        .image-preview-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .image-preview-container img {
            max-width: 100%;
            height: auto;
            border-radius: 0.25rem;
            box-shadow: 0 0 0.25rem rgba(0, 0, 0, 0.1);
        }

        textarea {
            min-height: 100px !important;
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

        .modal-content {
            width: auto !important;
            height: auto !important;
            border: none !important;
            background: none !important;
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

        .next,
        .prev {
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

        .next {
            right: 0;
            margin-right: 12px;
        }

        .prev {
            left: 0;
            margin-left: 12px;
        }

        .prev:hover,
        .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .image-container img:hover{
            transform: scale(1.05);
            cursor: pointer;
        }
    </style>
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="row" style="height: 100vh">
            <div class="col-md-6" style="margin-top: 30px;">
                <img src="{{ url($car->thumbnail) }}" class="rounded a gallery-image" style="margin-top:2px!important;" alt="Araba Fotoğrafı">
                <div class="form-group mt-4">
                    <strong class="form-label" for="images">Araç Resimleri:</strong>
                    <div class="d-flex flex-column">
                        <div id="image-container" class="image-preview-container">
                            @php
                                // JSON verisini PHP dizisine dönüştür
                                $imagesArray = json_decode($car->images, true);
                            @endphp
                            @foreach ($imagesArray as $image)
                                <img class="er gallery-image" src="{{ url($car->handleImagePath($image)) }}" alt="Görsel">
                            @endforeach
                            <div id="myModal" class="modal justify-content-center align-items-center">
                                <div class="modal-content">
                                    <span class="close"></span>
                                    <img id="modalImage" src="" alt="Görsel">
                                    <a class="prev" onclick="changeImage(-1)">&#10094;</a>
                                    <a class="next" onclick="changeImage(1)">&#10095;</a>
                                </div>
                            </div>

                            <script>
                                var modal = document.getElementById("myModal");
                                var modalImg = document.getElementById("modalImage");
                                var currentIndex = 0;
                                var images = document.querySelectorAll(".gallery-image");
                                var navbar = document.getElementById("navbar")

                                images.forEach((img, index) => {
                                    img.onclick = function() {
                                        currentIndex = index;
                                        showModal();
                                    }
                                });

                                function showModal() {
                                    modal.style.display = "block";
                                    modalImg.src = images[currentIndex].src;
                                    navbar.style.display = "none";
                                    modal.style.display = "flex";
                                }

                                function hideModal() {
                                    modal.style.display = "none";
                                    navbar.style.display = "flex";
                                }

                                function changeImage(step) {
                                    currentIndex += step;
                                    if (currentIndex > images.length - 1) {
                                        currentIndex = images.length - 1;
                                    } else if (currentIndex < 0) {
                                        currentIndex = 0;
                                    }
                                    modalImg.src = images[currentIndex].src;
                                }

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
            </div>
            <div class="col-md-6" style="margin-top: 25px;">
                <div>
                    <h2 class="uppercase">{{ $car->brand->name . ' ' . $car->name . ' ' . $car->year }}</h2>
                    <br>
                    <p><strong>Fiyatı:</strong> {{ number_format($car->price, 0, ',', '.') }} ₺</p>
                    <div class="d-flex pt-2">
                        <strong class="mt-2">Açıklama:</strong>
                        <textarea readonly class="form-control" style="margin-left:10px; width: 300px;">{{ $car->description }}</textarea>
                    </div>
                    <p class="pt-2">
                        <strong id="videolabel">Video:</strong>
                    </p>
                    <iframe id="videoFrame" style="width:79%; aspect-ratio: 16/9" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>

                    <script>
                        var url = "<?php echo $car->url; ?>";
                        var videolbl = document.getElementById("videolabel");

                        function setIframeSource(url) {
                            var iframe = document.getElementById('videoFrame');
                            var embedURL = '';

                            if (url.includes('youtube.com/watch')) {
                                const videoId = new URL(url).searchParams.get('v');
                                embedURL = `https://www.youtube.com/embed/${videoId}`;
                            } else if (url.includes('vimeo.com/')) {
                                const videoId = url.split('/').pop();
                                embedURL = `https://player.vimeo.com/video/${videoId}`;
                            } else {
                                console.error('Desteklenmeyen video URL\'si.');
                                videolbl.style.display = 'none';
                                return;
                            }
                            console.log("Embed URL:", embedURL);
                            iframe.src = embedURL;
                        }

                        setIframeSource(url);
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.master')
@section('title', $car->name)

@section('content')
<style>
/* Genel slider stil ayarları */
.owl-carousel .item {
    position: relative;
    overflow: hidden;
}

/* Video stil ayarları */
.video-item video {
    width: 100%;
    height: 100%;
    display: block;
}
</style>
    <!-- Header Inner Slider -->
    <header class="header slider">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            @php
                // JSON verisini PHP dizisine dönüştür
                $imagesArray = json_decode($car->images, true);
            @endphp
            <div class="video-fullscreen-wrap">
                <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
                <div class="video-fullscreen-video" data-overlay-dark="4">
                    <video playsinline="" autoplay="" loop="" muted="">
                        <source src="{{url($car->url)}}" type="video/mp4" autoplay="" loop="" muted="">
                    </video>
                </div>
            </div>
            <div class="text-center item bg-img" data-overlay-dark="4" data-background="{{ url($car->thumbnail) }}"></div>
            @foreach ($imagesArray as $image)
                <div class="text-center item bg-img" data-overlay-dark="4"
                    data-background="{{ url($car->handleImagePath($image)) }}"></div>
            @endforeach
        </div>
    </header>
    <section class="car-details section-padding" style="padding: 50px 0 0 0!important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="row mb-60">
                        <div class="col-md-12">
                            <h3>Description</h3>
                            <p class="mb-30">{{ $car->description }}</p>
                        </div>
                    </div>
                    <!--  Gallery Image -->
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Image Gallery</h3>
                        </div>
                    </div>
                    <div class="row gallery-items mb-60">
                        @foreach ($imagesArray as $image)
                            <div class="col-md-4 gallery-masonry-wrapper single-item cardio">
                                <a href="{{ url($car->handleImagePath($image)) }}" title="" class="gallery-masonry-item-img-link img-zoom">
                                    <div class="gallery-box">
                                        <div class="gallery-img"> <img style="object-fit: cover" src="{{ url($car->handleImagePath($image)) }}"
                                                class="img-fluid mx-auto d-block" alt=""> </div>
                                        <div class="gallery-masonry-item-img"></div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- Sidebar -->
                <div class="col-lg-4 col-md-12" style="margin-top: 76.5px;">
                    <div class="sidebar-car">
                        <div class="title">
                            <h4>{{ number_format($car->price, 0, ',', '.') }} ₺<span></span></h4>
                        </div>
                        <div class="item">
                            <div class="features"><span><i class="omfi-door"></i> Doors</span>
                                <p>{{ $car->doors }}</p>
                            </div>
                            <div class="features"><span><i class="fa-sharp fa-light fa-engine"></i> HP</span>
                                <p>{{ $car->hp }}</p>
                            </div>
                            <div class="features"><span><i class="fa-light fa-gas-pump"></i></i> Fuel</span>
                                <p>{{ $car->fuel }}</p>
                            </div>
                            <div class="features"><span><i class="fa-regular fa-weight-hanging"></i> Mass (kg)</span>
                                <p>{{ $car->mass }}</p>
                            </div>
                            <div class="features"><span><i class="omfi-transmission"></i> Gear</span>
                                <p>{{ $car->gear }}</p>
                            </div>
                            <div class="features"><span><i class="fa-light fa-gear"></i> Drive Type</span>
                                <p>{{ $car->drive_type }}</p>
                            </div>
                            <div class="features"><span style="width: max-content"><i class="fa-light fa-gauge-high"></i>
                                    Top Speed (km/h)</span>
                                <p>{{ $car->top_speed }}</p>
                            </div>
                            <div class="features"><span><i class="fa-light fa-person-seat"></i> Seats</span>
                                <p>{{ $car->seats }}</p>
                            </div>
                            <div class="features"><span><i class="omfi-transmission"></i> Transmission</span>
                                <p>{{ $car->transmission }}</p>
                            </div>
                            <div class="features"><span><i class="fa-light fa-calendar-days"></i> Year</span>
                                <p>{{ $car->year }}</p>
                            </div>
                            <div class="btn-double mt-30" data-grouptype="&amp;"> <a data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-bs-whatever="@mdo" href="#0">Rent Now</a> <a
                                    href="https://api.whatsapp.com/send?phone=8551004444" target="_blank"><span
                                        class="fa-brands fa-whatsapp"></span> WhatsApp</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
