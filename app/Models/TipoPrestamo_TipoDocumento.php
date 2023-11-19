<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestamo_TipoDocumento extends Model
{
    use HasFactory;

    public $table = "tipo_prestamo_tipo_documento";

    public $primaryKey = "id";

    public $fillable = [
        "id_prestamo",
        "id_categoria_prestamo",
        "id_tipo_documento",
        "activo"
    ];


    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class, 'id_prestamo', 'id_prestamo');
    }

    public function categoria_prestamo()
    {
        return $this->belongsTo(CategoriaPrestamo::class, 'id_categoria_prestamo', 'id_categoria_prestamo');
    }

    public function documento()
    {
        return $this->belongsTo(TipoDocumento::class, 'id_tipo_documento', 'id_tipo_documento');
    }


}
