<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Observaciones;
use App\Models\Seguimiento_Observaciones;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use App\Exports\ObservacionExport;
use Maatwebsite\Excel\Facades\Excel;

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
 
             $seguimiento->status=strtoupper($request->input('status'));
             $seguimiento->mensaje=strtoupper($request->input('mensaje'));
             $seguimiento->id_observacion=$request->input('id_observacion');
             $seguimiento->save();
     
             return response()->json($seguimiento);
         }
    }

    public function buscar($dato){
        $observaciones=Observaciones::where('id','=',$dato)
        ->orWhere('nombre','LIKE','%'.$dato.'%')
        ->orWhere('apellido_paterno','LIKE','%'.$dato.'%')
        ->orWhere('apellido_materno','LIKE','%'.$dato.'%')
        ->orWhere('email','LIKE','%'.$dato.'%')
        ->orWhere('fecha','=',$dato)
        ->paginate(10);

        return view('Administrador.quejas_sugerencias')->with('observaciones',$observaciones);
    }

    /**Funcion para mostrar el seguimiento a detalle de cada uno de las quejas y sugerencias  */
    public function detalle($id){
        $seguimiento=Seguimiento_Observaciones::where('id_observacion','=',$id)
        ->get();

        return $seguimiento;
    }

    public function descargar_pdf_detalle($id){
        $seguimiento=Seguimiento_Observaciones::where('id_observacion','=',$id)
        ->get();

        $pdf=\PDF::loadView('Pdfs.seguimiento',compact('seguimiento'));
        return $pdf->stream();
    }

    public function descargar_pdf(){
        $observaciones=Observaciones::all();

        $pdf=\PDF::loadView('Pdfs.quejas_sugerencias',compact('observaciones'));
        return $pdf->stream();
    }

    public function descargar_excel(){
        return Excel::download(new ObservacionExport, 'observaciones.xlsx');
    }

    public function buscar_observacion($id,$dato){

    }
}
