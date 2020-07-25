<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organizacion extends Model
{
    protected $table='organizacion';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['nombre_organizacion','nombre_dirigente','status'];
}
