@extends('layouts.login')

@section('content')
    <style>
        .banner-card {
            position: initial;
        }

        .banner-card img {
            width: 100%;
            margin-bottom: 10px;
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
            width: 70%;
            max-width: 600px;
            border-radius: 10px;
        }

        .banner-text h1 {
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .banner-text h2 {
            font-size: 3rem;
            margin-bottom: 20px;
            color: darkgoldenrod;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #fff;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        .form-group input:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.8);
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background: darkgoldenrod;
            color: #ffffff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: goldenrod;
        }

    </style>

    <main>
        <div class="banner-card">
            <img src="{{ asset('images/page.jpg') }}" alt="logo">
        </div>
        <div class="banner-text font-bold">
            <h1>Welcome to Coffee Shop</h1>
            <h2>Login</h2>

            @if (session('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required autofocus >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <button type="submit">Login</button>
                    </div>
                </form>

                <a href="{{ route('password.request')}}">Forgot Password?</a> <!-- Link Lupa Password -->
            </div>
        </div>
    </main>
@endsection