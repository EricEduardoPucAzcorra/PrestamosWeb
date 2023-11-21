<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;

class AvalController extends Controller
{
    //
    public function viewAvals(){
        return view('vistas.avales');
    }
}
