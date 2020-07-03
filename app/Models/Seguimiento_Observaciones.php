<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seguimiento_Observaciones extends Model
{
    protected $table='seguimiento_observaciones';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','mensaje','status','id_observacion'];
}
