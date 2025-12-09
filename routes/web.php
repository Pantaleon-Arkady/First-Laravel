<?php

use App\Http\Controllers\CrudUserController;
use App\Http\Controllers\GeneralController;
use Illuminate\Support\Facades\Route;

Route::get('/laravel-welcome', function () {
    return view('welcome');
});

Route::get('/initial', function () {
    return view('initial');
});

Route::get('/about', function () {
    return view('about');
});

Route::post('/choose-that-pokemon', [GeneralController::class, 'choosePokemon']);

Route::get('/register', function () {
    return view('register');
});

Route::get('/', function () {
    return view('home');
});

// Quick CRUD Users

Route::post('/user-register', [CrudUserController::class, 'userRegister']);
Route::post('/user-login', [CrudUserController::class, 'userLogin']);
Route::get('/user-logout', [CrudUserController::class, 'userLogout']);
