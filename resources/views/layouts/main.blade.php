<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('main.css') }}">
    <title>@yield('title')</title>
</head>
<body>

@if(auth()->check())
    <div class="header-container">
        <header>
            <nav>
                <a href="{{ route('admin.application.index') }}" class="btn primary">Заявки</a>
            </nav>

            <div class="profile">
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn primary">Выйти</button>
                </form>
            </div>
        </header>
    </div>
@endif

<div class="container">
    @yield('content')
</div>

<script src="{{ asset('main.js') }}"></script>

</body>
</html>
