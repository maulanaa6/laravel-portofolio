<?php

use App\Http\Controllers\depanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authcontroller;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\skillController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\educationController;
use App\Http\Controllers\experienceController;
use App\Http\Controllers\pengaturanHalamanController;

Route::get('/', [depanController::class, "index"]);

Route::redirect('home', 'dashboard');

Route::get('/auth', [authcontroller::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authcontroller::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authcontroller::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authcontroller::class, "logout"]);


Route::get('/dashboard', function () {
    return view('dashboard.index');
});

Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/', [HalamanController::class, 'index']);
        Route::resource('Halaman', HalamanController::class);
        Route::resource('experience', experienceController::class);
        Route::resource('education', educationController::class);
        Route::get('skill', [skillController::class, "index"])->name('skill.index');
        Route::post('skill', [skillController::class, "update"])->name('skill.update');
        Route::get('profile', [profileController::class, "index"])->name('profile.index');
        Route::post('profile', [profileController::class, "update"])->name('profile.update');
        Route::get('pengaturanHalaman', [pengaturanHalamanController::class, "index"])->name('pengaturanHalaman.index');
        Route::post('pengaturanHalaman', [pengaturanHalamanController::class, "update"])->name('pengaturanHalaman.update');
    }
);
