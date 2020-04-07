<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventuales extends Model
{
    protected $table='eventuales';
    protected $primarykey='id_eventuales';
    public $timestamps=false;
    protected $fillable=['id_eventuales','longitud_fin','latitud_fin','id_permiso'];
}
