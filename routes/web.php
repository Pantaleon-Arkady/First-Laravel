<?php

use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/laravel-welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('initial');
});

Route::get('/about', function () {
    return view('about');
});

Route::post('/choose-that-pokemon', [GeneralController::class, 'choosePokemon']);

Route::get('/register', function () {
    return view('register');
});
