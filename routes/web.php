<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KerusakanController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/user', function () {
    return view('layouts-user.main');
});

Route::get('/tentang', function () {
    return view('user.kerusakan');
});


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::resource('/gejala', GejalaController::class);
Route::resource('/kerusakan',KerusakanController::class);
