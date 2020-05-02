<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Permiso;
use App\Models\Actividad_Comercial;
use App\Models\Vendedor;
class ActividadesComercialesController extends Controller
{
    public function index($id){
        $vendedor=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('actividad_comercial','vendedor.id_actividad','=','actividad_comercial.id')
        
        ->where('id_actividad','=',$id)
        ->get();
        return view('administrador.actividades_comerciales')->with('vendedor',$vendedor);
    }
}
