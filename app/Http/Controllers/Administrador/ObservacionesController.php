<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Observaciones;
use App\Models\Seguimiento_Observaciones;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
class ObservacionesController extends Controller
{
    /**Muesta la pagina principal de las observaciones realizadas */
    public function index(){
        $observaciones=Observaciones::paginate(10);
        return view('Administrador.quejas_sugerencias')->with('observaciones',$observaciones);
    }

    /**Funcion para responder a una observacion realizada por algun usuario */
    public function responder_observacion(Request $request){
        $rules= array(
            'mensaje'=>'required',
            'status'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {
             $seguimiento=new Seguimiento_Observaciones;
 
             $seguimiento->status=$request->input('status');
             $seguimiento->mensaje=$request->input('mensaje');
             $seguimiento->id_observacion=$request->input('id_observacion');
             $seguimiento->save();
     
             return response()->json($seguimiento);
         }
    }

    /**Funcion para mostrar el seguimiento a detalle de cada uno de las quejas y sugerencias  */
    public function seguimiento($id){
        $seguimiento=Seguimiento_Observaciones::where('id_observacion','=',$id)
        ->get();

        return $seguimiento;
    }
}
