<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agencia extends Model
{
    protected $table='agencia';
    protected $primarykey='id_agencia';
    public $timestamps=false;
    protected $fillable=['id_agencia','nombre','tipo_agencia'];
}
