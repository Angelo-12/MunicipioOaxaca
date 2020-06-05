<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Anuales;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class AnualesController extends Controller
{
    public function insertarAnuales(Request $request){
        $rules= array(
            'largo'=>'required',
            'ancho'=>'required',
            'utensilios'=>'required',
            'id_permiso'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {

             $id_permiso=$request->input('id_permiso');
             $anuales=new Anuales;
 
             $anuales->largo=$request->input('largo');
             $anuales->ancho=$request->input('ancho');
             $anuales->utensilios=$request->input('utensilios');
             $anuales->id_permiso=$request->input('id_permiso');
        
             $anuales->save();

             $permiso=Permisos::find($id_permiso);
             $permiso->asignado='1';
             $permiso->save();
     
             return response()->json($anuales);
         }
    }

    public function editar(Request $request){

    }

    public function eliminar(Request $request){

    }
}
