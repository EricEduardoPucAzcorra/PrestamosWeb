<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Garantia extends Model
{
    use HasFactory;

    public $table = "garantia";
    public $primaryKey = "id_garantia";
    public $fillable = [
        "id_prestamo",
        "id_cliente",
        "id_tipo_garantia",
        "percibido_buen_estado",
        "color",
        "marca",
        "modelo",
        "tamano",
        "anios_uso",
        "observaciones",
        "sistema", "folio",
        "num_identificacion"
    ];


    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'id_prestamo', 'id_prestamo');
    }

    public function cliente(){
        return $this->belongsTo(Persona::class, 'id_cliente', 'id_persona');
    }

    public function garantia()
    {
        return $this->belongsTo(TipoGarantia::class, 'id_tipo_garantia', 'id_tipo_garantia');
    }


}
