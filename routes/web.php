<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/kontak', function () {
    return view('kontak');
});

Route::get('/hello', function () {
    return 'Hello World';
});

Route::get('/about', function () {
    return 'Nim = 23.51.0035, Nama = Rena Laurentina';
});

Route::get('/user/{name?}', function ($name='Paijo') {
    return 'Hallo Nama Saya '.$name;
});

Route::get('/user/{name}', function ($name) {
    return 'Hallo Nama Saya '.$name;
});
