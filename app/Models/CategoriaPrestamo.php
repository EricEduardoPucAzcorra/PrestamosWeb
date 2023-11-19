<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPrestamo extends Model
{
    use HasFactory;

    public $table = "categoria_prestamo";

    public $primaryKey = "id_categoria_prestamo";

    public $fillable = [
        "nombre",
        "descripcion"
    ];
}
