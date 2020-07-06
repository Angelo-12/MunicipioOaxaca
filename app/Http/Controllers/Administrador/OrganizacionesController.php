<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organizacion;
use App\Models\Vendedor;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class OrganizacionesController extends Controller
{
    //Funcion que muyestra la pagina principal de las organizaciones
    public function index(){
        $organizaciones=Organizacion::paginate(10);
        return view('Administrador.organizaciones')->with('organizaciones',$organizaciones);
    }

    //Funcion para insertar una nueva organizacion
    public function insertar(Request $request){

        $rules= array(
           'nombre_organizacion'=>'required',
           'nombre_dirigente'=>'required',
        );

        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $org=new Organizacion;

            $org->nombre_organizacion=$request->input('nombre_organizacion');
            $org->nombre_dirigente=$request->input('nombre_dirigente');
            $org->save();
    
            return response()->json($org);
        }
    }

    //Funcion para editar una organizacion validando cada uno de los campos sean correctos
    public function editar(Request $request){
        $rules= array(
            'nombre_organizacion'=>'required',
            'nombre_dirigente'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

        else{
            $org = Organizacion::find ($request->id);
            $org->nombre_organizacion = $request->nombre_organizacion;
            $org->nombre_dirigente = $request->nombre_dirigente;
            $org->save();
            return response()->json($org);
        }
    }

    public function detalle_organizacion($id){
        $vendedores=Vendedor::join('users','users.id','=','vendedor.id_usuario')
        ->where('vendedor.id_organizacion','=',$id)
        ->get();
        return $vendedores;
    }
}
