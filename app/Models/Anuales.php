<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anuales extends Model
{
    protected $table='anuales';
    protected $primarykey='id_anuales';
    public $timestamps=false;
    protected $fillable=['id_anuales','largo','ancho','utensilios','motivo'];
}
