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
            <li class="active"><a href="{{ route('home') }}">Главная</a></li>
            <li><a href="#">Авторизация</a></li>
            <li><a href="#">Регистрация</a></li>
        </ul>

        <ul class="nav pull-right">
            <li><a>Username</a></li>
            <li><a href="#">Выход</a></li>
        </ul>
    </div>
</div>

@yield('content')

</body>
</html>
