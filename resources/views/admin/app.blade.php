<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>K2: {{ env('APP_NAME') }}</title>
    @vite([
        'resources/scss/admin/app.scss',
        'resources/js/tab.js',
    ])
</head>
<body>

<div id="wrapper">

    <header>
        <div class="row">
            <a href="{{ env('APP_URL') }}" class="link">На сайт</a>
            <div class="user_area">
                <a href="">{{ Auth::user()->login }}</a>
                <a href="">({{ Auth::user()->group->name }})</a>
                <a href="{{ route('admin.user.logout') }}">Выход</a>
            </div>
        </div>
        <div class="row">
            <a href="{{ route('admin.index') }}" id="logo">K2: {{ env('APP_NAME') }}</a>
            <nav>
                <x-link route="">Очереди</x-link>
                <x-link route="admin.user.index">Пользователи</x-link>
                <x-link route="admin.file.index">Файлы</x-link>
                <x-link route="">Настройки</x-link>
            </nav>
        </div>
    </header>

    <aside>
        <div class="section_area">
            <x-link route="admin.order.index">Заказы</x-link>
            <x-link route="admin.product.index">Товары</x-link>
            <x-link route="admin.category.index">Категории</x-link>
            <x-link route="admin.tag.index">Теги</x-link>
        </div>
    </aside>

    <main>@yield('content')</main>

    <footer>
        K2. Админ - панель для Laravel.&nbsp; <a href="">Документация</a>
    </footer>
</div>



</body>
</html>

