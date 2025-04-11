@extends('layouts.main')
@section('title', 'Заявки')

@section('content')
    <style>
        table, tr, th, td {
            padding: 5px;

            border: 1px solid #000;
            border-collapse: collapse;
        }
    </style>

    <form action="{{ route('admin.logout') }}" method="post">
        @csrf
        <button type="submit" class="btn">Выйти</button>
    </form>

    <h1>Заявки</h1>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Отчество</th>
            <th>Номер телефона</th>
            <th>Комментарий</th>
            <th>Откуда</th>
            <th>Куда</th>
            <th>Услуга</th>
            <th>Тип груза</th>
            <th>Дата поставки</th>
            <th>Доп. услуга</th>
        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->first_name }}</td>
                <td>{{ $application->patronymic ?? 'Нет' }}</td>
                <td>{{ $application->phone_number }}</td>
                <td>{{ $application->comment ?? 'Нет' }}</td>
                <td>{{ $application->from->name }}</td>
                <td>{{ $application->to->name }}</td>
                <td>{{ $application->service->name }}</td>
                <td>{{ $application->cargoType->name }}</td>
                <td>{{ $application->delivery_date }}</td>
                <td>{{ $application->additionalService->name ?? 'Нет' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
