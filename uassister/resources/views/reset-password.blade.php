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
        <div>
            <div class="banner-card">
                <img src="{{ asset('images/page.jpg') }}" alt="logo">
            </div>
            <div class="banner-text font-bold">
                <h1>Reset Password</h1>

                @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password Baru</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div>
                    <div class="form-actions">
                        <button type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
