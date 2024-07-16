@extends("layouts.admin")
@section("title","Create Brand")
@section("content")
<div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            Marka Ekleme Formu
          </div>
          <div class="card-body">
            <form method="POST" action="{{route("admin.brand.store")}}">
                @csrf
              <div class="mb-3">
                <label for="brandName" class="form-label">Marka Adı</label>
                <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Marka adını giriniz" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Açıklama</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Marka hakkında açıklama giriniz"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Marka Ekle</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
