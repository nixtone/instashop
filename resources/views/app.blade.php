<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<!-- $DESCRIPTION$ -->">
    <meta name="keywords" content="<!-- $KEYWORDS$ -->">
    <link rel="icon" type="image/ico" href="{{ asset('favicon.ico') }}">
    <title>instashop - @yield('title')</title>
    @vite([
        'resources/scss/app.scss',
        'resources/js/tab.js'
    ])
</head>
<body>
<div id="wrapper">

    <div class="container">
        <header>
            <div class="row c1">
                <a href="{{ route('page.index') }}" id="logo">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="" class="bimg">
                </a>
                <nav>
                    <a href="#" class="link">Оплата и доставка</a>
                    <a href="#" class="link">О магазине</a>
                </nav>
                <a href="{{ route('cart.index') }}" class="cart_link">Корзина</a>
            </div>
        </header>

        @yield('content')

        <div id="message" class="block">

        </div>

    </div>

</div>
<footer>
    <div class="container">&copy; instashop</div>
</footer>
</body>
</html>
