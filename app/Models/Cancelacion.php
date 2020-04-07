<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cancelacion extends Model
{
    protected $table='cancelacion';
    protected $primarykey='id_cancelacion';
    public $timestamps=false;
    protected $fillable=['id_cancelacion','id_permiso','fecha_cancelacion','motivo','observaciones'];
}
