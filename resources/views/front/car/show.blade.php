@extends('layouts.front')
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
                    <div class="d-flex justify-content-between pt-2" style="width: 500px">
                            @csrf
                            <a href="{{ route('admin.car.edit', $car->slug) }}" class="btn btn-outline-success" style="width: 100px">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        <form method="POST" action="{{ route('admin.car.delete', $car->slug) }}">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-outline-danger" style="width: 100px">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
