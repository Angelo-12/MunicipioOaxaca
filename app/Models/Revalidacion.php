<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Revalidacion extends Model
{
    protected $table='revalidacion';
    protected $primarykey='id_revalidacion';
    public $timestamps=false;
    protected $fillable=['id_revalidacion','id_permiso','fecha_revalidacion','monto'];
}
