@extends("layouts.front")
@section("title", "Car Details")
@section("content")
<div class="container">
    <div class="row">
      <div class="col">
        <div>
          <img src="1.jpg" class="rounded a" alt="Araba Fotoğrafı">
          <div>
          <button class="a mt-4 btn btn-primary">Resim seç&nbsp;&nbsp;<i class="fa fa-folder"></i></button>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="mt-5">
          <h2>Araba Adı</h2>
          <p><strong>Rengi:</strong> Araba Rengi</p>
          <p><strong>Fiyatı:</strong> Araba Fiyatı</p>
        </div>
      </div>
    </div>
  </div>
@endsection
@section("style")
<style>
    img {
      width: 500px;
      height: 300px;
      margin-top: 30px;
    }
    .a{
        width: 100%;
    }
  </style>
@endsection
