<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sancion;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;

class SuspensionesController extends Controller
{
    public function insertar(Request $request){
        $rules= array(
            'id_permiso'=>'required',
            'multa'=>'required',
            'motivo'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {
             $sancion=new Sancion;
 
             $sancion->id_permiso=$request->input('id_permiso');

             $sancion->fecha_sancion=date('Y-m-d');
             $sancion->multa=$request->input('multa');
             $sancion->motivo=$request->input('motivo');
             $sancion->save();
     
             return response()->json($sancion);
         }
    }
}
