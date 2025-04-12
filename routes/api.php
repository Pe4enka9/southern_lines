<?php

use App\Http\Controllers\Api\FormController;
use Illuminate\Support\Facades\Route;

Route::get('/form', [FormController::class, 'index']);
Route::post('/form', [FormController::class, 'store']);
