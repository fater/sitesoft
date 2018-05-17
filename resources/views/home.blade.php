@extends('layouts.sitesoft')

@section('content')
    <div class="row-fluid">
        <div class="span2"></div>
        <div class="span8">

            @if(Auth::check())
                {{-- ФОРМА ДОБАВЛЕНИЯ СООБЩЕНИЯ ДЛЯ АВТОРИЗОВАННЫХ ПОЛЬЗОВАТЕЛЕЙ --}}
                <form action="{{ route('add_message') }}" method="post" class="form-horizontal" style="margin-bottom: 50px;">
                    {{ csrf_field() }}

                    @if($errors->any())
                        {{-- ВЫВОД СООБЩЕНИЙ --}}
                        <div class="alert alert-error">
                            @foreach($errors->all() as $error)
                                - {{ $error }}<br />
                            @endforeach
                        </div>
                    @endif

                    <div class="control-group">
                        <textarea style="width: 100%; height: 50px;" name="message" placeholder="Ваше сообщение..."></textarea>
                    </div>

                    <div class="control-group">
                        <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                    </div>
                </form>
            @endif

            {{-- БЛОК СПИСКА СООБЩЕНИЙ --}}
            @foreach(\App\Message::getAllMessages() as $message)
                <div class="well">
                    <h5>{{ $message->getUser->name }}</h5>
                    {{ $message->message }}
                </div>
            @endforeach
        </div>
    </div>
@endsection
