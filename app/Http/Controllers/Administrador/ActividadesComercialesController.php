<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\User;
use App\Models\Permiso;
use App\Models\Tipo_Actividad;
use App\Models\Vendedor;
class ActividadesComercialesController extends Controller
{
    /*Funcion que muestra la pagina principal de las actividades comerciales, se recibe 
    como parametro un id que corresponde a la actividad comercial*/
    public function index($id){
        $actividad="";
        if($id==1){
            $actividad="Comercial Movil";
        }else if($id==2){
            $actividad="Comercial Semifija";
        }else if($id==3){
            $actividad="Comercial Movil Con Equipo Rodante";
        }else if($id==4){
            $actividad="Comercial Fija";
        }else if($id==5){
            $actividad="Comercios Establecidos ";
        }else if($id==6){
            $actividad="Tianguis";
        }else if($id==7){
            $actividad="Prestacion de servicios";
        }
        $vendedor=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','tipo_actividad')
        ->where('tipo_actividad','=',$id)
        ->paginate(10);
       
       //return $vendedor;
       return view('administrador.actividades_comerciales')->with('vendedor',$vendedor)->with('actividad',$actividad);
    }

    public function insertar(Request $request){

    }

    public function editar(Request $request){

    }

    public function eliminar(Request $request){

    }
}
