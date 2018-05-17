@extends('layouts.sitesoft')

@section('content')
    <div class="row-fluid">
        <div class="span4"></div>
        <div class="span8">

            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <div class="control-group">
                    <b>Регистрация</b>
                </div>
                <div class="control-group{{ $errors->has('name') ? ' error' : '' }}">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Логин" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                        <span class="help-inline">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="control-group{{ $errors->has('email') ? ' error' : '' }}">
                    <input id="email" type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <span class="help-inline">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="control-group{{ $errors->has('password') ? ' error' : '' }}">
                    <input id="password" type="password" class="form-control" name="password" placeholder="Пароль" required>
                    @if ($errors->has('password'))
                        <span class="help-inline">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="control-group{{ $errors->has('confirm') ? ' error' : '' }}">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Повторите пароль" required>
                </div>
                <div class="control-group">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </form>
        </div>
    </div>
@endsection
