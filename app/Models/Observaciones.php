<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table='observaciones';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','nombre','apellido_paterno',
    'apellido_materno','correo','motivo','fecha','id_calle','id_tipo'];
}
