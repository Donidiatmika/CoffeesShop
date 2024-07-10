@extends('layouts.app')

@section('content')
    <style>
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .menu-section,
        .specials-section {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            width: calc(50% - 20px);
        }

        .menu-section h2,
        .specials-section h2 {
            color: #6d4c41;
            font-size: 1.8em;
            margin-bottom: 10px;
        }

        .menu-items,
        .specials-items {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .menu-item,
        .special-item {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 8px;
        }

        .menu-item h3,
        .special-item h3 {
            color: #6d4c41;
            font-size: 1.2em;
            margin-bottom: 10px;
        }

        .menu-item ul,
        .special-item p {
            list-style-type: none;
            padding-left: 0;
        }

        .menu-item ul li {
            margin-bottom: 5px;
        }

        .special-item img {
            width: 100%;
            border-radius: 8px;
            margin-top: 10px;
        }
    </style>

    <body>
        <main>
            <section class="menu-section">
                <h2>Menu Utama</h2>
                <div class="menu-items">
                    <div class="menu-item">
                        <h3>Kopi Spesial</h3>
                        <ul>
                            <li>Espresso</li>
                            <li>Americano</li>
                            <li>Cappuccino</li>
                            <li>Latte</li>
                            <li>Mocha</li>
                        </ul>
                    </div>
                    <div class="menu-item">
                        <h3>Minuman Dingin</h3>
                        <ul>
                            <li>Iced Coffee</li>
                            <li>Iced Latte</li>
                            <li>Frappuccino</li>
                        </ul>
                    </div>
                    <div class="menu-item">
                        <h3>Minuman Teh</h3>
                        <ul>
                            <li>Teh Hitam</li>
                            <li>Teh Hijau</li>
                            <li>Teh Chamomile</li>
                        </ul>
                    </div>
                    <div class="menu-item">
                        <h3>Minuman Segar</h3>
                        <ul>
                            <li>Jus Buah Segar</li>
                            <li>Smoothies</li>
                        </ul>
                    </div>
                    <div class="menu-item">
                        <h3>Snack</h3>
                        <ul>
                            <li>Croissant</li>
                            <li>Sandwich</li>
                            <li>Cake</li>
                        </ul>
                    </div>
                </div>
            </section>

            <section class="specials-section">
                <h2>Menu Spesial</h2>
                <div class="specials-items">
                    <div class="special-item">
                        <h3>Kopi Khas Bulan Ini</h3>
                        <p>Deskripsi kopi khas bulan ini.</p>
                        <img src="coffee_special.jpg" alt="Kopi Khas Bulan Ini">
                    </div>
                    <div class="special-item">
                        <h3>Promo Spesial</h3>
                        <p>Deskripsi promo spesial.</p>
                        <img src="promo_special.jpg" alt="Promo Spesial">
                    </div>
                </div>
            </section>
        </main>
    </body>

    </html>
@endsection
