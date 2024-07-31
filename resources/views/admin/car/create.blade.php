@extends('layouts.admin')
@section('title', 'Create Car')
@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="margin-top: 50px; margin-bottom: 50px;">
        <div style="width: 700px;" class="card row">
            <div class="card-header">
                Araba Ekleme Formu
            </div>
            <div class="card-body">
                <form method="POST" enctype="multipart/form-data" action="{{route("admin.car.store")}}">
                    @csrf
                    <div class="mb-3">
                        <label for="brand_id" class="form-label">Marka:</label>
                        <select class="form-control" id="brand_id" name="brand_id" rows="3">
                            <option value="" selected disabled>Lütfen Seçiniz</option>
                            @foreach ($all_brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Model:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Model giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Fiyat(₺):</label>
                        <input type="text" class="form-control" id="price" name="price"
                            placeholder="Fiyat giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="fuel" class="form-label">Yakıt Tipi:</label>
                        <input type="text" class="form-control" id="fuel" name="fuel"
                            placeholder="Yakıt Tipi giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="drive_type" class="form-label">Çekiş Türü:</label>
                        <input type="text" class="form-control" id="drive_type" name="drive_type"
                            placeholder="Çekiş Bilgisi giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="mass" class="form-label">Ağırlık(kg):</label>
                        <input type="text" class="form-control" id="mass" name="mass"
                            placeholder="Ağırlık giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="doors" class="form-label">Kapı Sayısı:</label>
                        <input type="text" class="form-control" id="doors" name="doors"
                            placeholder="Kapı Sayısı giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="seats" class="form-label">Koltuk Sayısı:</label>
                        <input type="text" class="form-control" id="seats" name="seats"
                            placeholder="Koltuk Sayısı giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="hp" class="form-label">Beygir(hp):</label>
                        <input type="text" class="form-control" id="hp" name="hp"
                            placeholder="Beygir Gücü giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="top_speed" class="form-label">Maksimum Hız(km/h):</label>
                        <input type="text" class="form-control" id="top_speed" name="top_speed"
                            placeholder="Maksimum Hız giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="transmission" class="form-label">Vites Tipi:</label>
                        <input type="text" class="form-control" id="transmission" name="transmission"
                            placeholder="Vites Türü giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="gear" class="form-label">Vites Sayısı:</label>
                        <input type="text" class="form-control" id="gear" name="gear"
                            placeholder="Vites Sayısı giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Kategori:</label>
                        <input type="text" class="form-control" id="type" name="type"
                            placeholder="Kasa Türünü giriniz" required="">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Açıklama:</label>
                        <textarea class="form-control" id="description" name="description"
                            placeholder="Açıklama giriniz"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Video:</label>
                        <input type="text" class="form-control" id="url" name="url"
                            placeholder="Url giriniz">
                    </div>
                    <div class="mb-3 row">
                        <label class="form-label" for="image">Araç Resmi:</label>
                        <div>
                            <div>
                                <div id="image-container" style="display: flex; flex-wrap: wrap;">
                                    <!-- Seçilen resimler burada gösterilecektir -->
                                </div>
                                <input style="margin-top: 10px;" type="file" id="images" name="images[]" accept=".jpg, .jpeg, .png" multiple>
                            </div>
                            <script>
                                document.getElementById('images').addEventListener('change', function() {
                                    var files = this.files; // Seçilen dosyaları alalım
                                    var container = document.getElementById('image-container');
                                    container.innerHTML = ''; // Önceki resimleri temizleyelim

                                    // Dosyalar arasında döngü yapalım
                                    for (var i = 0; i < files.length; i++) {
                                        var file = files[i];
                                        var reader = new FileReader(); // Dosya okuyucu oluşturalım

                                        reader.onload = function(e) {
                                            var img = document.createElement('img'); // Yeni bir img etiketi oluşturalım
                                            img.src = e.target.result; // Dosyanın base64 verisini img'nin src'ine atalım
                                            img.className = 'rounded'; // Stil sınıfını ekleyelim (isteğe bağlı)
                                            img.style.width = '150px'; // Genişliği ayarlayalım
                                            img.style.height = '150px'; // Yüksekliği ayarlayalım
                                            img.style.margin = '5px'; // Resimler arasında boşluk bırakalım

                                            container.appendChild(img); // Yeni resmi kapsayıcıya ekleyelim
                                        }

                                        reader.readAsDataURL(file); // Dosyayı base64 formatında okuyalım
                                    }
                                });
                            </script>
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
