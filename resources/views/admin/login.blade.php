@extends('layouts.main')
@section('title', 'Авторизация')

@section('content')
    <form action="{{ route('admin.login') }}" method="post" class="form">
        @csrf

        <h1>Авторизация</h1>

        <div class="input-container">
            <label for="login">Логин</label>
            <input type="text" name="login" id="login" placeholder="Логин" value="{{ old('login') }}">
            @error('login') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div class="input-container">
            <label for="password">Пароль</label>
            <input type="password" name="password" id="password" placeholder="Пароль">
            @error('password') <p class="error">{{ $message }}</p> @enderror
        </div>

        @error('auth') <p class="error">{{ $message }}</p> @enderror

        <button type="submit" class="btn">Войти</button>
    </form>
@endsection
