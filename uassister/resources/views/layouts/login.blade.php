<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-HZcZlGqVBWk6c1G0XGwOCzgHJUWJ9R0tDQFHH7Ff8Nn7ZxgIOzh9qN6YmGILW/85A5OgPP8R2IDH0CmYdU3XZw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* CSS untuk membuat header tetap di atas saat scroll */
        header {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            /* Mengatur z-index agar tetap di atas konten */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            /* Efek bayangan untuk menonjolkan header */
        }

        /* Padding tambahan untuk mengompensasi posisi konten */
        .content {
            padding-top: 100px;
            /* Sesuaikan dengan tinggi header Anda */
        }

        .footer {
            left: 0;
            bottom: 0;
            width: 100%;
            text-align: center;
            background-color: #ffffff;
            color: rgb(0, 0, 0);
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Coffee Shop Logo">
                </a>
                <div class=" w-9/12 text-center">
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-orange-700">
                        Rumah
                    </span>
                    <span class="self-center text-xl w-9/12 font-semibold whitespace-nowrap dark:text-white">
                        Kopi
                    </span>
                    <div class="basis-1/3">
                        <span class="self-center text-xl w-9/12 font-semibold whitespace-nowrap dark:text-white">
                            Nusantara
                        </span>
                    </div>
                </div>
            </div>
            <nav>
                <ul>
                
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
</body>
<footer>
    <div class="footer">
        <p class="inline-block">UAS SISTEM TERDISTRIBUSI. All rights reserved</p>
    </div>
</footer>

</html>
