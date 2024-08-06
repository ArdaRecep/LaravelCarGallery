@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #212529;
        color: #f8f9fa;
        height: 100vh;
        margin: 0;
    }
    .table-container {
        width: 80%;
        max-width: 800px;
        margin: 20px auto;
    }
    .table th img {
        width: 20px;
        height: 20px;
        margin-right: 8px;
    }
    .table img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 5px;
    }
    .table td, .table th {
        vertical-align: middle; /* Dikey ortalama */
        text-align: center; /* Metinleri ortalar */
        height: 96.8px; /* Tüm hücrelerin yüksekliği */
    }
    .table td img {
        display: block;
        margin: auto; /* Görsellerin ortalanmasını sağlar */
    }
    .table td:last-child {
        display: flex;
        flex-direction: column; /* Butonları dikey olarak hizalar */
        justify-content: center; /* Butonları dikey olarak ortalar */
        align-items: center; /* Butonları yatay olarak ortalar */
        gap: 5px; /* Butonlar arasına boşluk ekler */
    }
    .table td:last-child a,
    .table td:last-child button {
        display: inline-block; /* Butonların ve bağlantıların blok olarak düzenlenmesini sağlar */
        margin: 2px 0; /* Butonlar arasındaki boşluk */
        padding: 0.25rem 0.5rem; /* Buton iç padding'ini ayarlar */
        font-size: 0.875rem; /* Buton yazı boyutunu ayarlar */
        text-align: center; /* Metni ortalar */
        width: 100px;
    }
</style>

<div class="table-container">
    <h1 class="text-center mb-4">BRAND LIST</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Brand</th>
                <th scope="col">Actions</th> <!-- Actions başlığı eklenmiş -->
            </tr>
        </thead>
        <tbody>
            @foreach($brands as $brand)
            <tr>
                <td><img src="{{ url("storage/".$brand->image) }}" alt="{{ $brand->name }} Image"></td>
                <td>{{ $brand->name }}</td>
                <td>
                    <a href="{{ route("admin.brand.edit", $brand->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route("admin.brand.delete", $brand->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
