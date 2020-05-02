<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actividad_Comercial extends Model
{
    protected $table='actividad_comercial';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['nombre_actividad'];
}
