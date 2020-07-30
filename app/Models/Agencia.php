<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $table='agencia';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','nombre','tipo_agencia','latitud_noreste','longitud_noreste'
    ,'latitud_sureste','longitud_sureste','latitud_centro','longitud_centro'];
}
