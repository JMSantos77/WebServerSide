<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;

Route::get('/home', [IndexController::class, 'homePage'])->name('home');
/*
// A partir do momento que criei o IndexController, passei esta route para cima e a função está no controller
Route::get('/home', function () {
    return view('home.index'); //Para chamar files dentro de pastas: home.index
})->name('home'); //Pooso também dar um nome definido por mim para esta rota.
*/

Route::get('/', [IndexController::class, 'welcome'])->name('home.welcome');
/*
Route::get('/', function () {
    return view('welcome');
})->name('home.welcome');
*/

Route::fallback([IndexController::class, 'errors']);
/*
Route::fallback(function () {
    return view('errors.fallback');
});
*/

Route::get('/hello', [IndexController::class, 'hello'])->name('home.hello');
/*
Route::get('/hello', function () {
    return view('hello');
})->name('home.hello');
*/

Route::get('/users', [UserController::class, 'allUsers'])->name('users.all');
/*
Route::get('/users', function () {
    return view('users.all_users');
})->name('users.all');
*/



Route::get('/user', [UserController::class, 'viewUser'])->name('users.view');
Route::get('/user-add', [UserController::class, 'addUser'])->name('users.add');
Route::get('/user-update', [UserController::class, 'updateUser'])->name('users.update');


/**
 * Isto faz com que colocando no browser http://127.0.0.1:8000/hello/Miguel passe
 * Miguel como param e concatene Olá + Miguel
 */
/*
Route::get('/hello/{name}', function ($name) {
    return '<h2>Olá ' . $name . '</h2>';
});
*/

Route::get('/hello/{name}', [UserController::class, 'helloName']);


Route::get('/user', [UserController::class, 'viewUser'])->name('users.view');

Route::get('/tasks', [TaskController::class, 'allTasks'])->name('tasks.view');
