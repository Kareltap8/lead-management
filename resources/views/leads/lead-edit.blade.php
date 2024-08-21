@extends('layouts.main')

@section('title', 'Регистрация')


@section('content')
    
<h1>Редактировать лид</h1>

    <form method="POST" action="{{ route('leads.update', $lead->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $lead->name }}">
        </div>
        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input type="text" class="form-control" id="surname" name="surname" value="{{ $lead->surname }}">
        </div>
        <div class="form-group">
            <label for="phone">Телефон:</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{ $lead->phone }}">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $lead->email }}">
        </div>
        <div class="form-group">
            <label for="message">Сообщение:</label>
            <textarea class="form-control" id="message" name="message">{{ $lead->message }}</textarea>
        </div>
        <div class="form-group">
            <label for="status_id">Статус:</label>
            <select class="form-control" id="status_id" name="status_id">
                @foreach ($statuses as $status)
                    <option value="{{ $status->id }}" {{ $status->id == $lead->status_id ? 'selected' : '' }}>{{ $status->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
@endsection