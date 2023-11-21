<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPrestamo_TipoGarantia extends Model
{
    use HasFactory;

    public $table = "tipo_prestamo_tipo_garantia";

    public $primaryKey = "id";

    public $fillable = [
        "id_prestamo",
        "id_categoria_prestamo",
        "id_tipo_garantia",
        "permanente",
        "fecha_anulacion",
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
    public function garantia()
    {
        return $this->belongsTo(TipoGarantia::class, 'id_tipo_garantia', 'id_tipo_garantia');
    }
}
