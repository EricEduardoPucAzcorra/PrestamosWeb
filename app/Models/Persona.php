<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    public $table = "persona";
    public $primaryKey = "id_persona";
    public $fillable = [
        "nombre",
        "apellido_p",
        "apellido_m",
        "rfc",
        "domicilio",
        "telefono",
        "celular",
        "referencia",
        "clave_ine"
    ];
}
