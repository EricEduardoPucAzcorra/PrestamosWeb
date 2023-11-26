<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;
    public $table = 'modulo';
    public $primaryKey = 'id_modulo';
    public $fillable = [
        'nombre',
        'descripcion'
    ];
}
