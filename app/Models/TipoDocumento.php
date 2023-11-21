<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;
    public $table = "tipo_documento";

    public $primaryKey = "id_tipo_documento";

    public $fillable = [
        "etiqueta",
        "siglas",
        "ubicacion",
        "formato",
        "activo"
    ];
}
