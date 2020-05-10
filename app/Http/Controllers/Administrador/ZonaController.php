<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Permisos;
use App\Models\Vendedor;
use App\User;
use DB;
class ZonaController extends Controller
{
    public function index(){
        $zonas=Permisos::join('calle','permiso.id_calle','=','calle.id')
        ->join('zona','zona.id','=','calle.id_zona')
        ->select('zona.*',DB::raw('count(permiso.id)as total'))
        ->groupBy('zona.id')
        ->get();

        return view('Administrador.zonas_comercializacion')->with('zonas',$zonas);
    }

    public function detalle_zona($id){
        if($id==1){
            $zona="PERMITIDA";
        }else if($id==2){
            $zona="RESTRINGIDA";
        }else if($id==3){
            $zona="PROHIBIDA";
        }else if($id==4){
            $zona="SIN ZONA";
        }
        $vendedor=Vendedor::join('permiso','permiso.id','=','vendedor.id_permiso')
        ->join('users','users.id','vendedor.id_usuario')
        ->join('calle','calle.id','=','permiso.id_calle')
        ->join('zona','zona.id','=','calle.id_zona')
        ->where('zona.id','=',$id)
        ->select('users.*',DB::raw('permiso.*,vendedor.*'))
        ->paginate(10);

        return view('Administrador.detalle_zona')->with('vendedor',$vendedor)->with('zona',$zona);
    }

}
