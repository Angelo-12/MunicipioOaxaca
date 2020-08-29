<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Anuales;
use App\Models\Eventuales;
use App\Models\Provisionales;
use App\Models\Agencia;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PermisoExport;
use DB;
class PermisosController extends Controller
{
    //Funcion que nos regresa la pagina princiapl de cada uno de los permisos dependiente el parametro que reciba la funcion
    public function index($nombre){
        $agencias=Agencia::all();
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
        }else if($nombre=="Cancelados"){
            $permisos=Permisos::join('cancelacion','permiso.id','=','cancelacion.id_permiso')
            ->paginate(10);
            $nombre="Cancelados";

        }else if($nombre=="Sancionados"){
            $permisos=Permisos::join('sancion','permiso.id','=','sancion.id_permiso')
            ->paginate(10);
            $nombre="Sancionados";
        }else if($nombre=="Revalidados"){
            $permisos=Permisos::join('revalidacion','permiso.id','=','revalidacion.id_permiso')
            ->paginate(10);
            $nombre="Revalidados";
        }

        //return $anuales;
         return view('Administrador.permisos')->with('permisos',$permisos)->with('nombre',$nombre)
         ->with('agencias',$agencias);
    }

    //Funcion para insertar un nuevo permiso
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
            'id_colonia'=>'required'
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
             $permiso->id_colonia=$request->input('id_colonia');
             $permiso->asignado='0';
             $permiso->status='1';
             $permiso->save();
     
             return response()->json($permiso);
         }

    }

    public function editar(Request $request){
        $rules= array(
            'tipo_actividad'=>'required',
            'giro'=>'required',
            'latitud'=>'required',
            'longitud'=>'required|numeric',
            'dias_laborados'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required',
            'detalles'=>'required',
            'id_colonia'=>'required'
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
     
         else {
             $permiso=Permisos::find($request->id);

             $permiso->tipo_actividad=$request->input('tipo_actividad');
             $permiso->giro=$request->input('giro');
             $permiso->latitud=$request->input('latitud');
             $permiso->longitud=$request->input('longitud');
             $permiso->dias_laborados=$request->input('dias_laborados');
             $permiso->hora_inicio=$request->input('hora_inicio');
             $permiso->hora_fin=$request->input('hora_fin');
             $permiso->detalles=$request->input('detalles');
             $permiso->id_colonia=$request->input('id_colonia');
            
             $permiso->save();
     
             return response()->json($permiso);
         }
    }
    
    //Funcion que regresa los detalles de el permiso se recibe como parametro un id
    public function detalle_permiso($id){
        return Permisos::join('vendedor','vendedor.id_permiso','=','permiso.id')
        ->where('permiso.id','=',$id)
        ->get();
    }

    //Esporta a pdf cada uno de los registros de los permisos
    public function descargar_pdf($nombre){
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
        }else if($nombre=="Cancelados"){
            $permisos=Permisos::join('cancelacion','permiso.id','=','cancelacion.id_permiso')
            ->paginate(10);
            $nombre="Cancelados";

        }else if($nombre=="Sancionados"){
            $permisos=Permisos::join('sancion','permiso.id','=','sancion.id_permiso')
            ->paginate(10);
            $nombre="Sancionados";
        }else if($nombre=="Revalidados"){
            $permisos=Permisos::join('revalidacion','permiso.id','=','revalidacion.id_permiso')
            ->paginate(10);
            $nombre="Revalidados";
        }


        $pdf=\PDF::loadView('Pdfs.permisos',compact('permisos','nombre'));
        return $pdf->stream();

    }

    public function descargar_excel($nombre){
        return Excel::download(new PermisoExport($nombre), 'permisos.xlsx');
    }
}
