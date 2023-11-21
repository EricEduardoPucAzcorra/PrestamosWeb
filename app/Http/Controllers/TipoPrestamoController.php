<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\TipoPrestamo;

class TipoPrestamoController extends Controller
{
    public function index(){
        //7//colums
        $colum1 = array("field"=>"nombre", "header"=>"Nombre");
        // $colum2 = array("field"=>"descripcion", "header"=>"Descripcion");
        $colum3 = array("field"=>"monto", "header"=>"Monto");
        $colum4 = array("field"=>"observaciones", "header"=>"Observaciones");
        $colum5 = array("field"=>"tiene_garantia", "header"=>"Tiene garantía");
        $colum6 = array("field"=>"categoria", "header"=>"Categoría");
        $resultado[] = $colum1;
        // $resultado[] = $colum2;
        $resultado[] = $colum3;
        $resultado[] = $colum4;
        $resultado[] = $colum5;
        $resultado[] = $colum6;
        //get tipo prestamos
        // $consulta = TipoPrestamo::join("categoria_prestamo", "tipo_prestamo.id_categoria_prestamo","=", "categoria_prestamo.id_categoria_prestamo")->
        // select("categoria_prestamo.nombre as categoria", "tipo_prestamo.id_tipo_prestamo as id","tipo_prestamo.nombre as nombre","tipo_prestamo.descripcion as descripcion", "tipo_prestamo.monto as monto",
        // "tipo_prestamo.plazo as plazo", "tipo_prestamo.observaciones as observaciones", "tipo_prestamo.tiene_garantia as tiene_garantia", "tipo_prestamo.id_categoria_prestamo")
        // ->get();

        //$row = [];

        return view('vistas/tipo_prestamos', compact('resultado'));
    }
    public function getTiposPrestamos(){
        $tipos_prestamos = TipoPrestamo::join("categoria_prestamo", "tipo_prestamo.id_categoria_prestamo","=", "categoria_prestamo.id_categoria_prestamo")->
        select("categoria_prestamo.nombre as categoria", "tipo_prestamo.id_tipo_prestamo as id","tipo_prestamo.nombre as nombre","tipo_prestamo.descripcion as descripcion", "tipo_prestamo.monto as monto",
        "tipo_prestamo.plazo as plazo", "tipo_prestamo.observaciones as observaciones", "tipo_prestamo.tiene_garantia as tiene_garantia", "tipo_prestamo.id_categoria_prestamo")
        ->get();

        return $tipos_prestamos;
    }

    public function store(Request $request){
        $tipoPrestamo = new TipoPrestamo();
        $tipoPrestamo->nombre = $request->nombre;
        $tipoPrestamo->descripcion = "OK";
        $tipoPrestamo->monto = $request->monto;
        $tipoPrestamo->plazo = $request->plazo;
        $tipoPrestamo->observaciones = $request->observaciones;
        $tipoPrestamo->tiene_garantia = $request->tiene_garantia;
        $tipoPrestamo->id_categoria_prestamo = $request->id_categoria_prestamo;
        $tipoPrestamo->save();
    }
    public function update(Request $request){
        try {
            $tipoPrestamo = TipoPrestamo::findOrFail($request->id_tipo_prestamo);
            $tipoPrestamo->nombre = $request->nombre;
            $tipoPrestamo->descripcion = "OK";
            $tipoPrestamo->monto = $request->monto;
            $tipoPrestamo->plazo = $request->plazo;
            $tipoPrestamo->observaciones = $request->observaciones;
            $tipoPrestamo->tiene_garantia = $request->tiene_garantia;
            $tipoPrestamo->id_categoria_prestamo = $request->id_categoria_prestamo;
            $tipoPrestamo->update();

        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            // Puedes hacer algo con $errorMessage, como registrarlo o devolverlo como parte de tu respuesta
            return response()->json(['error' => $errorMessage], 404);
        }

    }
}
