<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administrador_Secretaria extends Model
{
    protected $table='admin_secretaria';
    protected $primarykey='id_admin_secretaria';
    public $timestamps=false;
    protected $fillable=['id_admin_secretaria','cargo','id'];
}
