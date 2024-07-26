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
    <div class="container d-flex align-items-center justify-content-center" style="height: 100vh">
        <div class="row">
            <div class="col-md-6">
                <img src="{{ url($car->handleImagePath($car->image)) }}" class="rounded a" alt="Araba Fotoğrafı">
                <div class="d-flex justify-content-between pt-3" style="width: 500px">
                    <button type="button" class="btn btn-outline-success" style="width: 100px">
                        <i class="fas fa-edit"></i> Edit
                    </button>
                    <form method="POST" action="{{ route('admin.car.delete', $car->slug) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-outline-danger" style="width: 100px">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mt-5">
                    <h2>{{ $car->name }}</h2>
                    <br>
                    <p><strong>Fiyatı:</strong> {{ $car->price }}</p>
                    <div class="d-flex pt-2">
                        <strong class="mt-2">Açıklama:</strong>
                        <textarea class="form-control" style="margin-left:10px; width: 300px;">{{ $car->description }}</textarea>
                    </div>
                    <p class="pt-3">
                        <strong>Markası:</strong>
                        {{ $car->brand->name }}
                    </p>
                    <p class="pt-2">
                        <strong>Video:</strong>
                    </p>
                    <iframe id="videoFrame" width="560" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>

                    <script>
                        // PHP'den gelen URL'yi JavaScript'e geçirebilirsiniz
                        var url = "<?php echo $car->url; ?>";

                        // URL'yi iframe 'e ayarlayan fonksiyon
                        function setIframeSource(url) {
                            var iframe = document.getElementById('videoFrame');
                            var embedURL = '';

                            if (url.includes('youtube.com/watch')) {
                                // YouTube URL'sinden video ID'sini ayıkla
                                const videoId = new URL(url).searchParams.get('v');
                                embedURL = `https://www.youtube.com/embed/${videoId}`;
                            } else if (url.includes('vimeo.com/')) {
                                // Vimeo URL'sinden video ID'sini ayıkla
                                const videoId = url.split('/').pop();
                                embedURL = `https://player.vimeo.com/video/${videoId}`;
                            } else {
                                // Desteklenmeyen URL'ler için
                                console.error('Desteklenmeyen video URL\'si.');
                                return;
                            }

                            // iframe 'in src özelliğini ayarla
                            console.log("Embed URL:", embedURL); // Hata ayıklama için
                            iframe.src = embedURL;
                        }

                        // Fonksiyonu çağır
                        setIframeSource(url);
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
