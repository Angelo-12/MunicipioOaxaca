<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Eventuales;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class EventualesController extends Controller
{
    public function insertar(Request $request){
        $rules= array(
            'latitud_fin'=>'required',
            'longitud_fin'=>'required',
            'id_permiso'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {

             $id_permiso=$request->input('id_permiso');
             $eventuales=new Eventuales;
 
             $eventuales->latitud_fin=$request->input('latitud_fin');
             $eventuales->longitud_fin=$request->input('longitud_fin');
             $eventuales->id_permiso=$request->input('id_permiso');
        
             $eventuales->save();

             $permiso=Permisos::find($id_permiso);
             $permiso->asignado='1';
             $permiso->save();
     
             return response()->json($eventuales);
         }
    }
}
