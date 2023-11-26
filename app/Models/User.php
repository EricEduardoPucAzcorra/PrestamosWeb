<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    public $table = 'users';

    public $primaryKey = "id_usuario";

    protected $fillable = [
        'usuario',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function permisos()
    {
        return $this->hasMany(User_Permiso::class, 'id_usuario');
    }


    public function hasPermission($permisoBuscado)
    {
        return $this->permisos->contains(function ($permiso) use ($permisoBuscado) {
            // Verificar si el subjson "permiso" existe y su campo "siglas" coincide
            return isset($permiso->permiso['siglas']) && $permiso->permiso['siglas'] === $permisoBuscado;
        });
    }



}
