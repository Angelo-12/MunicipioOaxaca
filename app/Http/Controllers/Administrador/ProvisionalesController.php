<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Provisionales;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ProvisionalesController extends Controller
{
    public function insertar(Request $request){
        $rules= array(
            'largo'=>'required',
            'ancho'=>'required',
            'utensilios'=>'required',
            'fecha_vencimiento'=>'required',
            'id_permiso'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
            
         else {

             $id_permiso=$request->input('id_permiso');
             $provisionales=new Provisionales;
 
             $provisionales->largo=$request->input('largo');
             $provisionales->ancho=$request->input('ancho');
             $provisionales->utensilios=strtoupper($request->input('utensilios'));
             $provisionales->fecha_vencimiento=$request->input('fecha_vencimiento');
             $provisionales->id_permiso=$request->input('id_permiso');
        
             $provisionales->save();

             $permiso=Permisos::find($id_permiso);
             $permiso->asignado='1';
             $permiso->save();
     
             return response()->json($provisionales);
         }
    }
}
