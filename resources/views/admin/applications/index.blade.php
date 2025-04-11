@extends('layouts.main')
@section('title', 'Заявки')

@section('content')
    <h1 class="mb-2">Заявки</h1>

    <section class="applications-container">
        @foreach($applications as $application)
            <div class="application">
                <p>{{ $application->id }} - {{ $application->first_name }} - {{ $application->patronymic ?? 'Нет' }}
                    - {{ $application->phone_number }} - {{ $application->comment ?? 'Нет' }}
                    - {{ $application->from->name }} - {{ $application->to->name }} - {{ $application->service->name }}
                    - {{ $application->cargoType->name }} - {{ $application->delivery_date }}
                    - {{ $application->additionalService->name ?? 'Нет' }}</p>

                <a href="{{ route('admin.application.show', $application) }}" class="btn">Подробнее</a>
            </div>
        @endforeach
    </section>
@endsection
