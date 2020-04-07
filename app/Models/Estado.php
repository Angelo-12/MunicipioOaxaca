<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $table='estado';
    protected $primarykey='id_estado';
    public $timestamps=false;
    protected $fillable=['id_estado','nombre'];
}
