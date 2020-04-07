<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $table='organizacion';
    protected $primarykey='id_organizacion';
    public $timestamps=false;
    protected $fillable=['id_organizacion','nombre_organizacion','nombre_dirigente'];
}
