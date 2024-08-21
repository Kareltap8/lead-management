@extends('layouts.main')

@section('title', 'Авторизация')

@section('content')
    <h1 class="mb-5">Авторизация</h1>
    <div class="container mt-5">
        <form action="{{ route('login.auth') }}" method="post">
            @csrf
            <div class="mb-4 form-group">
                <label for="email">E-mail</label>
                <input name="email" type="email" class="form-control" id="email">
            </div>
            <div class="mb-4 form-group">
                <label for="password">Пароль</label>
                <input name="password" type="password" class="form-control " id="password">
            </div>
            <div class=" mb-3 form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember">
                <label class="form-check-label" for="remember">
                    Запомнить меня
                </label>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Войти</button>
            <a href="{{ route('password.request') }}" class="ms-2">Забыли пароль?</a>
        </form>
    </div>
@endsection