<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home.welcome');


Route::get('/home', function () {
    return view('home.index'); //Para chamar files dentro de pastas: home.index
})->name('home'); //Pooso também dar um nome definido por mim para esta rota.


Route::fallback(function () {
    return view('errors.fallback');
});


Route::get('/hello', function () {
    return view('hello');
})->name('home.hello');


Route::get('/users', function () {
    return view('users.all_users');
})->name('users.all');


/**
 * Isto faz com que colocando no browser http://127.0.0.1:8000/hello/Miguel passe
 * Miguel como param e concatene Olá + Miguel
 */
Route::get('/hello/{name}', function ($name) {
    return '<h2>Olá ' . $name . '</h2>';
});
