<?php

use Illuminate\Support\Facades\Route;

//acceso login
Route::group(['middleware'=>['guest']], function(){
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'vistalogin'])->name('vista');
    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
});

Route::group(['middleware'=>["auth"]], function(){
    Route::get('/index', [App\Http\Controllers\Controller::class, 'index']);
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class,'salir'])->name('logout');

    //prestamos
    Route::any('/tipos-prestamos', function () {
        return view("vistas/tipo_prestamos");
    })->name("tipo_prestamo");

});

