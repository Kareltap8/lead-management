@extends('layouts.main')

@section('title', 'Главная страница')

@section('content')
    <div class="container">
        <h1>Обратная связь</h1>
        <form method="POST" action="{{ route('leads.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя:</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="form-group">
                <label for="surname">Фамилия:</label>
                <input type="text" class="form-control @error('surname') is-invalid @enderror" id="surname" name="surname" value="{{ old('surname') }}">
            </div>
            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="message">Сообщение:</label>
                <textarea class="form-control" id="message" name="message">{{ old('message') }}</textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>

    </div>
@endsection
