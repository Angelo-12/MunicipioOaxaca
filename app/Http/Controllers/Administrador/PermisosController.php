<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Anuales;
use App\Models\Eventuales;
use App\Models\Provisionales;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use DB;
class PermisosController extends Controller
{
    public function index($nombre){
        $permisos="";
        if($nombre=="Anuales"){
            $permisos=Permisos::join('anuales','permiso.id','anuales.id_permiso')
            ->paginate(10);
        }else if($nombre=="Eventuales"){
            $permisos=Permisos::join('eventuales','permiso.id','eventuales.id_permiso')
            ->paginate(10);
        }else if($nombre=="Provisionales"){
            $permisos=Permisos::join('provisionales','permiso.id','provisionales.id_permiso')
            ->paginate(10);
        }else if($nombre=="Pendientes"){
            $permisos=Permisos::where('asignado','=','0')
            ->paginate(10);
            $nombre="Pendientes";
        }

        //return $anuales;
         return view('Administrador.permisos')->with('permisos',$permisos)->with('nombre',$nombre);
    }

    public function insertar(Request $request){
        $rules= array(
            'numero_cuenta'=>'required|numeric',
            'numero_expediente'=>'required|numeric',
            'tipo_actividad'=>'required',
            'giro'=>'required',
            'latitud'=>'required',
            'longitud'=>'required|numeric',
            'dias_laborados'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required',
            'detalles'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {
             $permiso=new Permisos;
 
             $permiso->numero_cuenta=$request->input('numero_cuenta');
             $permiso->numero_expediente=$request->input('numero_expediente');
             $permiso->tipo_actividad=$request->input('tipo_actividad');
             $permiso->giro=$request->input('giro');
             $permiso->latitud=$request->input('latitud');
             $permiso->longitud=$request->input('longitud');
             $permiso->dias_laborados=$request->input('dias_laborados');
             $permiso->hora_inicio=$request->input('hora_inicio');
             $permiso->hora_fin=$request->input('hora_fin');
             $permiso->detalles=$request->input('detalles');
             $permiso->asignado='0';
             $permiso->status='1';
             $permiso->save();
     
             return response()->json($permiso);
         }

    }

    public function editar(Request $request){

    }

    public function eliminar(Request $request){

    }

    public function exportarPdf($nombre){
        $permisos="";
        if($nombre=="Anuales"){
            $permisos=Permisos::join('anuales','permiso.id','anuales.id_permiso')
            ->get();
        }else if($nombre=="Eventuales"){
            $permisos=Permisos::join('eventuales','permiso.id','eventuales.id_permiso')
            ->get();
        }else if($nombre=="Provisionales"){
            $permisos=Permisos::join('provisionales','permiso.id','provisionales.id_permiso')
            ->get();
        }else if($nombre=="Pendientes"){
            $permisos=Permisos::where('asignado','=','0')
            ->get();
            $nombre="Pendientes";
        }

        $pdf=\PDF::loadView('Pdfs.permisos',compact('permisos','nombre'));
        return $pdf->stream();

    }
}
