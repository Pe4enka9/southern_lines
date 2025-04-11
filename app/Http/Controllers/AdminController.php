<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AdminController extends Controller
{
    // Форма авторизации
    public function loginForm(): View
    {
        return view('admin.login');
    }

    // Авторизация
    public function login(AdminLoginRequest $request): RedirectResponse
    {
        $user = User::where('login', $request->input('login'))->first();

        if (!$user || !Hash::check($request->input('password'), $user->password)) {
            return back()->withInput()
                ->withErrors(['auth' => 'Неверный логин или пароль']);
        }

        auth()->login($user, true);

        return redirect()->route('admin.application.index');
    }

    // Выход
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('admin.login-form');
    }
}
