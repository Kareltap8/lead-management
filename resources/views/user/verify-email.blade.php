@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    <div class="alert alert-info" role="alert">
            Ссылка для подтверждения регистрации была отправлена на вашу почту.
        </div>
        <div>
            Не получили ссылку?
            <form action="{{ route('verification.send') }}" method="post">
                @csrf 
                <button type="submit" class="btn btn-link ps-0">Отправить ссылку</button>
            </form>
        </div>
@endsection