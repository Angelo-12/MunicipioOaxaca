<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organizacion;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class OrganizacionesController extends Controller
{
    public function index(){
        $organizaciones=Organizacion::paginate(10);
        return view('Administrador.organizaciones')->with('organizaciones',$organizaciones);
    }

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

    public function editar(Request $request){
        
            $org = Organizacion::find ($request->id);
            $org->nombre_organizacion = $request->nombre_organizacion;
            $org->nombre_dirigente = $request->nombre_dirigente;
            $org->save();
            return response()->json($org);
        
    }
}
