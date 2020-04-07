<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table='observaciones';
    protected $primarykey='id_observaciones';
    public $timestamps=false;
    protected $fillable=['id_observaciones','nombre','ap_paterno',
    'ap_materno','correo','motivo','fecha','id_calle','id_tipo'];
}
