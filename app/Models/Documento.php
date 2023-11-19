<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    public $table = "documento";

    public $primaryKey = "id_documento";

    public $fillable = [
        "id_tipo_documento",
        "url_documento",
        "direccion_guardado",
        "tamano_float",
        "tamano_string",
        "id_cliente",
        "id_aval"
    ];


    public function tipo_documento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento', 'id_tipo_documento');
    }

    public function cliente()
    {
        return $this->belongsTo(Persona::class, 'id_cliente', 'id_persona');
    }

    public function aval()
    {
        return $this->belongsTo(Persona::class, 'id_aval', 'id_persona');
    }

}
