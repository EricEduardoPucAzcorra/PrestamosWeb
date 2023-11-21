<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CategoriaPrestamo;

class CategoriaPrestamoController extends Controller
{
    //
    public function index(){
        $categorias = CategoriaPrestamo::all();

        return $categorias;

    }
}
