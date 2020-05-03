<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Permisos;
use App\Models\Vendedor;
use DB;
class ZonaController extends Controller
{
    public function index(){
       
        $zonas=DB::table('permiso')
        ->join('calle','permiso.id_calle','=','calle.id_calle')
        ->join('zona','zona.id_zona','=','calle.id_zona')
        ->select('zona.*',DB::raw('count(permiso.id_permiso)as total'))
        ->groupBy('zona.id_zona')
        ->get();

        //return $permiso;
        return view('Administrador.zonas_comercializacion')->with('zonas',$zonas);
    }
}
