<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tipo_Observaciones extends Model
{
    protected $table='tipo_observaciones';
    protected $primarykey='id_tipo';
    public $timestamps=false;
    protected $fillable=['id_tipo','nombre'];
}
