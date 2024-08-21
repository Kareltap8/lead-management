@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    <h1 class="mb-5">Регистрация</h1>
    <div class="container mt-5">
        <form action="{{ route('user.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="firstName">Имя</label>
                <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror" id="firstName" value="{{ old('name') }}">
                
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input name="email" type="email" class="form-control  @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}">
                
            </div>
            <div class="form-group">
                <label for="password">Пароль</label>
                <input name="password" type="password" class="form-control @error('password') is-invalid @enderror " id="password">
          
            </div>
            <div class="form-group">
                <label for="password_confirmation">Повторите пароль</label>
                <input name="password_confirmation" type="password" class="form-control" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Зарегистрироваться</button>
            <a href="{{ route('login') }}" class="ms-3">Уже зарегистрированы?</a>
        </form>
    </div>
@endsection