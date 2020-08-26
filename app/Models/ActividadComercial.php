<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ActividadComercial extends Model
{
    protected $table='actividadcomercial';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','nombreactividad'];
}
