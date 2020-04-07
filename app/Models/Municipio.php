<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table='municipio';
    protected $primarykey='id_municipio';
    public $timestamps=false;
    protected $fillable=['id_municipio','nombre','id_estado'];    
}
