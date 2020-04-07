<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    protected $table='vendedor';
    protected $primarykey='id_vendedor';
    public $timestamps=false;
    protected $fillable=['id_vendedor','rfc','curp','id','id_puesto','id_organizacion'];
}
