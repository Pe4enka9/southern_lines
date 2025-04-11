<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\View\View;

class ApplicationController extends Controller
{
    // Вывод всех заявок
    public function index(): View
    {
        $applications = Application::all();

        return view('admin.applications.index', [
            'applications' => $applications,
        ]);
    }

    // Одна заявка
    public function show(Application $application): View
    {
        return view('admin.applications.show', [
            'application' => $application,
        ]);
    }
}
