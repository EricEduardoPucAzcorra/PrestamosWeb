<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Persona;

class PersonaController extends Controller
{
    public function viewIndex(){
        $columnas = [];
        $colum1 = array("field"=>"nombre", "header"=>"Nombre");
        $colum2 = array("field"=>"apellido_p", "header"=>"Apellido Paterno");
        $colum3 = array("field"=>"apellido_m", "header"=>"Apellido Materno");
        $colum4 = array("field"=>"rfc", "header"=>"RFC");
        $colum5 = array("field"=>"domicilio", "header"=>"Domicilio");
        $colum6 = array("field"=>"telefono", "header"=>"Telefono");
        $colum7 = array("field"=>"clave_ine", "header"=>"Ine");

        $columnas[] = $colum1;
        $columnas[] = $colum2;
        $columnas[] = $colum3;
        //$columnas[] = $colum4;
        //$columnas[] = $colum5;
        //$columnas[] = $colum6;
        $columnas[] = $colum7;

        return view('vistas.clientes', compact("columnas"));
    }
    public function getClientes(){
        $clientes = Persona::select('persona.id_persona as id', 'persona.nombre as nombre','persona.apellido_p as apellido_p','persona.apellido_m', 'persona.rfc as rfc', 'persona.domicilio as domicilio',
        'persona.telefono as telefono', 'persona.celular as celular', 'persona.referencia as referencia', 'persona.clave_ine as clave_ine')->get();

        return $clientes;
    }

    public function store(Request $request){
        $NewCliente = new Persona();
        $NewCliente->nombre = $request->nombre;
        $NewCliente->apellido_p = $request->apellido_p;
        $NewCliente->apellido_m = $request->apellido_m;
        $NewCliente->rfc = $request->rfc;
        $NewCliente->clave_ine = $request->ine;
        $NewCliente->domicilio = $request->domicilio;
        $NewCliente->telefono = $request->telefono;
        $NewCliente->celular = $request->celular;
        $NewCliente->referencia = $request->referencia;
        $NewCliente->save();
    }

    public function update(Request $request){
        try {
            $Cliente = Persona::findOrFail($request->id_persona);
            $Cliente->nombre = $request->nombre;
            $Cliente->apellido_p = $request->apellido_p;
            $Cliente->apellido_m = $request->apellido_m;
            $Cliente->rfc = $request->rfc;
            $Cliente->clave_ine = $request->ine;
            $Cliente->domicilio = $request->domicilio;
            $Cliente->telefono = $request->telefono;
            $Cliente->celular = $request->celular;
            $Cliente->referencia = $request->referencia;
            $Cliente->update();
        } catch (\Throwable $th) {
            $errorMessage = $th->getMessage();
            // Puedes hacer algo con $errorMessage, como registrarlo o devolverlo como parte de tu respuesta
            return response()->json(['error' => $errorMessage], 404);
        }
    }


}
