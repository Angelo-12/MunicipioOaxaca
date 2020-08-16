<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Permiso;
use DB;
class ColoniasController extends Controller
{
    public function detalle($id){
        $colonia=Colonia::join('permiso','colonia.id','=','permiso.id_colonia')
        ->select('colonia.*',DB::raw('count(permiso.id_colonia)as total'))
        ->groupBy('colonia.id')
        ->where('colonia.id','=',$id)
        ->get();

        return $colonia;
    }

    public function buscar($dato){
        $colonia=Colonia::join('permiso','colonia.id','=','permiso.id_colonia')
        ->select('colonia.*',DB::raw('count(permiso.id_colonia)as total'))
        ->groupBy('colonia.id')
        ->orWhere('colonia.id','=',$dato)
        ->orWhere('colonia.nombre','LIKE','%'.$dato.'%')
        ->orWhere('colonia.codigo_postal','=',$dato)
        ->get();

        return $colonia;
    }

}
