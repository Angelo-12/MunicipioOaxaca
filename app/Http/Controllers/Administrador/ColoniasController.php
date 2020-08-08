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

    public function descargar_pdf(){

    }

    public function descargar_excel(){

    }
}
