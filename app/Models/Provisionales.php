<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provisionales extends Model
{
    protected $table='provisionales';
    protected $primarykey='id_provisionales';
    public $timestamps=false;
    protected $fillable=['id_provisionales','largo','ancho','utensilios','fecha_vencimiento','id_permiso'];
}
