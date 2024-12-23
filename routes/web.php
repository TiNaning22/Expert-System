<?php

use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KerusakanController;

Route::get('/', function () {
    return view('welcome');
});

<<<<<<< HEAD
Route::get('/user', function () {
    return view('layouts-user.main');
});

Route::get('/tentang', function () {
    return view('user.kerusakan');
});

=======
>>>>>>> 90de7303a9398559cbc4fc802580de42eafa5948
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard');

Route::resource('/gejala', GejalaController::class);
Route::resource('/kerusakan',KerusakanController::class);
