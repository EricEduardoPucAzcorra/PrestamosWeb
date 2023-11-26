<?php

use Illuminate\Support\Facades\Route;
use App\Models\Persona;

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
    Route::get('/tipos-prestamos', [App\Http\Controllers\TipoPrestamoController::class, 'index'])->name('tipo_prestamo');
    Route::get('/list-tipos-prestamos', [App\Http\Controllers\TipoPrestamoController::class, 'getTiposPrestamos']);
    Route::post('/new-tipo-prestamo', [App\Http\Controllers\TipoPrestamoController::class, 'store']);
    Route::put('/update-tipo-prestamo', [App\Http\Controllers\TipoPrestamoController::class, 'update']);
    //categorias
    Route::get('/categorias_prestamos',[App\Http\Controllers\CategoriaPrestamoController::class, 'index']);
    //clientes
    Route::get('/clientes', [App\Http\Controllers\PersonaController::class, 'viewIndex'])->name('clientes')->middleware('checkPermisos:administracion.clientes.ver');
    Route::get('/listclientes', [App\Http\Controllers\PersonaController::class, 'getClientes'])->middleware('checkPermisos:administracion.clientes.ver');
    Route::post('/new-persona', [App\Http\Controllers\PersonaController::class, 'store'])->middleware('checkPermisos:administracion.clientes.nuevo');
    Route::put('/update-persona', [App\Http\Controllers\PersonaController::class, 'update'])->middleware('checkPermisos:administracion.clientes.editar');
    //avales
    Route::get('/avales', [App\Http\Controllers\AvalController::class, 'viewAvals'])->name('avales');

    Route::get('/usPermisos', [App\Http\Controllers\UserPermisoController::class, 'getUserPermisos'])->middleware('checkPermisos:administracion.clientes.detalle');

});





