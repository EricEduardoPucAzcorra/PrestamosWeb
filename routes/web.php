<?php

use Illuminate\Support\Facades\Route;
use App\Models\Persona;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/personas', function(){
    $personas = Persona::all();

    return $personas;
});

Route::get('/index', [App\Http\Controllers\Controller::class, 'index']);

Route::get("/prestamos", [App\Http\Controllers\PrestamoController::class, 'index']);
