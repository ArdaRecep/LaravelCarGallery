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
            width: 150px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .table td,
        .table th {
            vertical-align: middle;
            /* Dikey ortalama */
            text-align: center;
            /* Metinleri ortalar */
        }

        .table td img {
            display: block;
            margin: auto;
            /* Görsellerin ortalanmasını sağlar */
        }

        .table td:last-child {
            height: 96.8px;
            /* Tüm hücrelerle uyumlu yükseklik */
            display: flex;
            flex-direction: column;
            /* Butonları dikey olarak hizalar */
            justify-content: center;
            /* Butonları dikey olarak ortalar */
            align-items: center;
            /* Butonları yatay olarak ortalar */
            gap: 5px;
            /* Butonlar arasına boşluk ekler */
        }
        .table td:last-child a,
.table td:last-child button {
    width: 100px;
}

        .table td:last-child form {
            margin: 0;
            /* Formun çevresindeki boşlukları kaldırır */
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            /* Butonların iç padding'ini ayarlar */
            font-size: 0.875rem;
            /* Buton yazı boyutunu ayarlar */
        }

        th {
            text-align: center;
            /* Başlıkları ortalar */
        }
    </style>
    <div class="table-container">
        <h1 class="text-center mb-4">CAR LIST</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Brand</th>
                    <th scope="col" class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $car)
                <tr>
                    <td><img src="{{ url($car->thumbnail) }}"></td>
                    <td>{{ $car->slug }}</td>
                    <td>{{ $car->brand->name }}</td>
                    <td class="text-center">
                        <a href="{{ route("admin.car.edit", $car->slug) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route("admin.car.delete", $car->slug) }}" method="POST" style="display:inline;">
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
