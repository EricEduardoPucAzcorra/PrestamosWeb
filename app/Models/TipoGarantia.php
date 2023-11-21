<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoGarantia extends Model
{
    use HasFactory;

    public $table = "tipo_garantia";

    public $primaryKey = "id_tipo_garantia";

    public $fillable = [
        "garantia",
        "descripcion",
        "objeto",
        "caracteristicas"
    ];

}
