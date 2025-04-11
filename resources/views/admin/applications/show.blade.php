@extends('layouts.main')
@section('title', $application->first_name)

@section('content')
    <h1 class="mb-2">Заявка {{ $application->first_name }} (ID: {{ $application->id }})</h1>

    <div class="info">
        <h2>Имя: {{ $application->first_name }}</h2>
        <h2>Отчество: {{ $application->patronymic ?? 'Нет' }}</h2>
        <p>Номер телефона: {{ $application->phone_number }}</p>
        <p>Комментарий: {{ $application->comment ?? 'Нет' }}</p>
        <p>Откуда: {{ $application->from->name }}</p>
        <p>Куда: {{ $application->to->name }}</p>
        <p>Услуга: {{ $application->service->name }}</p>
        <p>Тип груза: {{ $application->cargoType->name }}</p>
        <p>Дата доставки: {{ $application->delivery_date }}</p>
        <p>Доп. услуги: {{ $application->additionalService->name ?? 'Нет' }}</p>
    </div>
@endsection
