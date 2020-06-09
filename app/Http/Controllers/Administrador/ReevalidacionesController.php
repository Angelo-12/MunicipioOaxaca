<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Revalidacion;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class ReevalidacionesController extends Controller
{
    public function insertar(Request $request){
        $rules= array(
            'id_permiso'=>'required',
            'monto'=>'regex:/^\d{1,3}(?:\.\d\d\d)*(?:,\d{1,2})?$/',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {
             $revalidacion=new Revalidacion;
 
             $revalidacion->id_permiso=$request->input('id_permiso');
             $revalidacion->fecha_revalidacion=date('Y-m-d');
             $revalidacion->monto=$request->input('monto');
             $revalidacion->save();
     
             return response()->json($revalidacion);
         }
    }
}
