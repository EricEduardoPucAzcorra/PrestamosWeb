<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Prestamo;

class PrestamoController extends Controller
{
    //
    public function index(){
        $prestamos = Prestamo::all();

        return $prestamos;
    }
}
