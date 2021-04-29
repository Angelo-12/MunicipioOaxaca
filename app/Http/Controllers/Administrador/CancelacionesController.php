<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cancelacion;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class CancelacionesController extends Controller
{
    public function insertar(Request $request){
        $rules= array(
            'id_permiso'=>'required',
            'motivo_cancelacion'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {
             $cancelacion=new Cancelacion;
 
             $cancelacion->id_permiso=$request->input('id_permiso');

             $cancelacion->fecha_cancelacion=date('Y-m-d');
             $cancelacion->motivo_cancelacion=strtoupper($request->input('motivo_cancelacion'));
             $cancelacion->observaciones=strtoupper($request->input('observaciones'));
             $cancelacion->save();
     
             return response()->json($cancelacion);
         }
    }
}
