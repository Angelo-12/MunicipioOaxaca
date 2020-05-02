<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table='vendedor';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','rfc','curp','id_usuario','id_puesto','id_organizacion','id_actividad'];
}
