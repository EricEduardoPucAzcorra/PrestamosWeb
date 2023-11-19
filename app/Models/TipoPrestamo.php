<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestamo extends Model
{
    use HasFactory;

    public $table = "tipo_prestamo";

    public $primaryKey = "id_tipo_prestamo";

    public $fillable = [
        "nombre",
        "descripcion",
        "monto",
        "plazo",
        "observaciones",
        "tiene_garantia",
        "id_categoria_prestamo",
    ];

    public function categoriaPrestamo(){

        return $this->belongsTo(CategoriaPrestamo::class, 'id_categoria_prestamo', 'id_categoria_prestamo');

    }


}
