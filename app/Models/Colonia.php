<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    protected $table='colonia';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id','nombre','codigo_postal','id_agencia','id_municipio',
    'latitud_noresteC','longitud_noresteC','latitud_suresteC','longitud_suresteC',
    'latitud_centroC','longitud_centroC'];
}
