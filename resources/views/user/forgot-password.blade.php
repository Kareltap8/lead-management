@extends('layouts.main')

@section('title', 'Восстановление пароля')

@section('content')
    <h1 class="mb-5">Восстановление пароля</h1>
    <p>Введите свой email для получения ссылки на сброс пароля</p>
    <div class="container mt-5">
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="mb-4 form-group">
                <label for="email">E-mail</label>
                <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                
            </div>
            <button type="submit" class="btn btn-primary mt-3">Отправить</button>
        </form>
    </div>
@endsection