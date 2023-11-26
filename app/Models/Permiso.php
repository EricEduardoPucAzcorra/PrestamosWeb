<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    public $table = 'permiso';

    public $with = ['modulo'];

    public $primaryKey = 'id_permiso';

    public $fillable = [
        'nombre',
        'descripcion',
        'siglas',
        'id_modulo',
        'activo'
    ];


    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo', 'id_modulo');
    }
}
