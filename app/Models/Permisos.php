<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table='permiso';
    protected $primarykey='id_permiso';
    public $timestamps=false;
    protected $fillable=['id_permiso','id_calle','numero_cuenta','numero_expediente',
    'fecha_registro','tipo_actividad','giro','latitud','longitud','dias_laborados',
    'hora_inicio','hora_fin','detalles'];
}
