@extends('layouts.login')

@section('content')
    <style>
        .banner-card {
            position: initial;
        }

        .banner-card img {
            width: 100%;
            /* height: 500%; */
            margin-bottom: 10px;
            /* object-fit: cover; */
        }

        .banner-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            /* Menggunakan rgba untuk transparansi */
            width: 70%;
            /* Lebar teks di dalam banner */
            max-width: 600px;
            /* Maksimum lebar agar tidak terlalu lebar di layar besar */
            border-radius: 10px;
            /* Sudut border untuk style */
        }

        .banner-text h1 {
            font-size: 2rem;
            /* Ukuran font judul kecil */
            margin-bottom: 15px;
            /* Jarak antara judul dan paragraf */
        }

        .banner-text h2 {
            font-size: 3rem;
            /* Ukuran font judul besar */
            margin-bottom: 20px;
            /* Jarak antara judul dan paragraf */
            color: darkgoldenrod;
        }
    </style>

    <main>
        <div>
            <div class="banner-card">
                <img src="{{ asset('images/page.jpg') }}" alt="logo">
            </div>
            <div class="banner-text font-bold">
                <h1 class="text-4xl">Welcome to</h1>
                <h2 class="text-3xl">Rumah Kopi Nusantara</h2>
            </div>
        </div>
    </main>
@endsection
