@extends('layouts.main')

@section('title', 'Восстановление пароля')

@section('content')
    <h1 class="mb-5">Восстановление пароля</h1>
    <div class="container mt-5">
        <form action="{{ route('password.update') }}" method="post">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
            <button type="submit" class="btn btn-primary mt-3">Восстановить пароль</button>
        </form>
    </div>
@endsection