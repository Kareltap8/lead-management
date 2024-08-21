@extends('layouts.main')

@section('title', 'Регистрация')

@section('content')
    
    <h1>Список лидов</h1>

    <p>Всего лидов: {{ $leads->count() }}</p>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Дата создания</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $lead)
                <tr>
                    <td>{{ $lead->id }}</td>
                    <td>{{ $lead->name }}</td>
                    <td>{{ $lead->surname }}</td>
                    <td>{{ $lead->email }}</td>
                    <td>{{ $lead->phone }}</td>
                    <td>{{ $lead->created_at }}</td>
                    <td>{{ $lead->status->name ?? 'Не назначен' }}</td> 
                    <td>
                        <a href="{{ route('leads.edit', $lead->id) }}" class="btn btn-primary">Редактировать</a>
                        <form action="{{ route('leads.destroy', $lead->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Вы уверены, что хотите удалить этот лид?')">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Статистика по статусам</h2>

    <ul>
        @foreach ($statuses as $status)
            <li>
                <b>{{ $status->name }}:</b> {{ $statusCounts[$status->id] ?? 0 }}
            </li>
        @endforeach
    </ul>
@endsection