<?php

use Faker\Guesser\Name;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\KerusakanController;


Route::get('/', function () {
    return view('user.landing-page');
});

Route::get('/tentang', function () {
    return view('user.kerusakan');
});

Route::get('/diagnosa', [UserController::class, 'diagnosa']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('postLogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

#Admin 
Route::middleware([IsAdmin::class])->group(function () {
    Route::get('/dashboard', function () {
                return view('dashboard.dashboard');
            })->name('dashboard');
    
    Route::resource('/gejala', GejalaController::class)->middleware('auth');

    Route::resource('/kerusakan',KerusakanController::class);

});