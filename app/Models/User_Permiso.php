<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Permiso extends Model
{
    use HasFactory;

    public $table = 'user_permiso';

    public $with = ['modulo','permiso','user'];

    public $primaryKey = 'id_usPermiso';

    public $fillable = [
        'id_usuario',
        'id_permiso',
        'id_modulo',
        'fecha_asignacion',
        'id_usuario_registro',
        'id_usuario_actualizacion'
    ];

    public function modulo()
    {
        return $this->belongsTo(Modulo::class, 'id_modulo', 'id_modulo');
    }


    public function permiso()
    {
        return $this->belongsTo(Permiso::class, 'id_permiso', 'id_permiso');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id_usuario');
    }


}
