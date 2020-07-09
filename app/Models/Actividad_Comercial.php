<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad_Comercial extends Model
{
    protected $table='tipo_actividad';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['nombre_actividad'];
}
