<?php

use Illuminate\Support\Facades\Route;

Route::get('/laravel-welcome', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('landing');
});

Route::get('/about', function () {
    return view('about');
});
