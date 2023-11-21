<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aval_Cliente extends Model
{
    use HasFactory;

    public $table = "aval_cliente";

    public $primaryKey = "id";

    public $fillable = [
        "id_cliente",
        "id_aval",
        "detalles",
        "esfamiliar",
        "esconocido",
        "anio_conocerse"
    ];


    public function cliente()
    {
        return $this->belongsTo(Persona::class, 'id_cliente', 'id_persona');
    }

    public function aval()
    {
        return $this->belongsTo(Persona::class, 'id_aval', 'id_persona');
    }


}
