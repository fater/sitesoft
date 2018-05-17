@extends('layouts.sitesoft')

@section('content')
    <div class="row-fluid">
        <div class="span4"></div>
        <div class="span3">

            @if($errors->any())
                {{-- ВЫВОД СООБЩЕНИЙ --}}
                <div class="alert alert-error">
                    @foreach($errors->all() as $error)
                        - {{ $error }}<br />
                    @endforeach
                </div>
            @endif

            <form action="" method="post" class="form-horizontal">
                {{ csrf_field() }}
                <div class="control-group">
                    <b>Авторизация</b>
                </div>
                <div class="control-group">
                    <input type="text" id="inputLogin" name="email" placeholder="Логин" data-cip-id="inputLogin" />
                </div>
                <div class="control-group">
                    <input type="password" id="inputPassword" name="password" placeholder="Пароль"
                            data-cip-id="inputPassword">
                </div>
                <div class="control-group">
                    <label class="checkbox"> <input type="checkbox" name="remember" value="1"> Запомнить меня </label>
                    <button type="submit" class="btn btn-primary">Вход</button>
                </div>
            </form>
        </div>
    </div>
@endsection
