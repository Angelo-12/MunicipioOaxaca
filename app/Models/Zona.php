<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table='zona';
    protected $primarykey='id_zona';
    public $timestamps=false;
    protected $fillable=['id_zona','nombre'];
}
