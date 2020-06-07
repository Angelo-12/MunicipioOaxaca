<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    protected $table='sancion';
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['id_permiso','fecha_sancion','multa','motivo'];
}
