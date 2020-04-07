<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    protected $table='calle';
    protected $primarykey='id_calle';
    public $timestamps=false;
    protected $fillable=['id_calle','nombre','puestos_maximos','id_colonia','id_zona'];
}
