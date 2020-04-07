<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    protected $table='sancion';
    protected $primarykey='id_sancion';
    public $timestamps=false;
    protected $fillable=['id_sancion','id_permiso','fecha_sancion','multa','motivo'];
}
