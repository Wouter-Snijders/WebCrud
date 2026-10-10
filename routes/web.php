<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class)->middleware(['auth', 'admin']);

route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
