<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;



Route::get('', [HomeController::class, 'index'])->name('bs.index');

Route::get('tobuy', [HomeController::class, 'toBuy'])->name('bs.tobuy');

Route::post('bought', [HomeController::class, 'bought'])->name('bs.bought');

Route::get('lastswinners', [HomeController::class, 'lastswinners'])->name('bs.lastswinners');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
