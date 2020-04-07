<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table='pago';
    protected $primarykey='id_pago';
    public $timestamps=false;
    protected $fillable=['id_permiso','fecha_pago','numero_liquidacion','monto'];
}
