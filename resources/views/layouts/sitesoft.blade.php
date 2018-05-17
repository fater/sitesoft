<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Сайтсофт</title>

    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="{{ assert('media/bootstrap/js/bootstrap.min.js') }}"></script>
    <link href="{{ asset('media/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen">
</head>
<body>

<div class="navbar">
    <div class="navbar-inner">
        <a class="brand" href="{{ route('home') }}">Сайтсофт</a>
        <ul class="nav">
            <li @if(Route::is('home'))class="active"@endif><a href="{{ route('home') }}">Главная</a>
            </li>
            @if(Auth::guest())
                <li @if(Route::is('login'))class="active"@endif>
                    <a href="{{ route('login') }}">Авторизация</a></li>
                <li @if(Route::is('register'))class="active"@endif>
                    <a href="{{ route('register') }}">Регистрация</a></li>
            @endif
        </ul>

        @if(Auth::check())
            <ul class="nav pull-right">
                <li><a>{{ Auth::user()->name }}</a></li>
                <li>
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Выход </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        @endif
    </div>
</div>

@yield('content')

</body>
</html>
