<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    public $table = "prestamo";

    public $primaryKey = "id_prestamo";

    public $with = ["cliente", "tipo_prestamo", "categoria_prestamo"];

    public $fillable = [
        "id_cliente",
        "id_tipo_prestamo",
        "id_categoria_prestamo",
        "monto",
        "interes",
        "plazo",
        "plazo_text",
        "fecha_inicio",
        "fecha_final",
        "fecha_pago",
        "total_pagos",
        "plazo_pago"
    ];
    //relacion clientes
    public function cliente(){
        return $this->belongsTo(Persona::class, 'id_cliente', 'id_persona');
    }

    public function tipo_prestamo()
    {
        return $this->belongsTo(TipoPrestamo::class, 'id_tipo_prestamo', 'id_tipo_prestamo');
    }

    public function categoria_prestamo()
    {
        return $this->belongsTo(CategoriaPrestamo::class, 'id_categoria_prestamo', 'id_categoria_prestamo');
    }


}
