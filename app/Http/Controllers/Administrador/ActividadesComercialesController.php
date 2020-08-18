<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\User;
use App\Models\Permiso;
use App\Models\Tipo_Actividad;
use App\Models\Vendedor;
use App\Models\Actividad_Comercial;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActividadExport;
use App\Exports\ActividadVendedorExport;

class ActividadesComercialesController extends Controller
{
    /*Funcion que muestra la pagina principal de las actividades comerciales, se recibe 
    como parametro un id que corresponde a la actividad comercial*/
    /*public function index($id){
        $actividad="";
        if($id==1){
            $actividad="Comercial Movil";
        }else if($id==2){
            $actividad="Comercial Semifija";
        }else if($id==3){
            $actividad="Comercial Movil Con Equipo Rodante";
        }else if($id==4){
            $actividad="Comercial Fija";
        }else if($id==5){
            $actividad="Comercios Establecidos ";
        }else if($id==6){
            $actividad="Tianguis";
        }else if($id==7){
            $actividad="Prestacion de servicios";
        }
        $vendedor=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','tipo_actividad')
        ->where('tipo_actividad','=',$id)
        ->paginate(10);
       
       //return $vendedor;
       return view('administrador.actividades_comerciales')->with('vendedor',$vendedor)->with('actividad',$actividad);
    }*/

   public function index(){
        $actividades=Actividad_Comercial::join('permiso','tipo_actividad.id','=','permiso.tipo_actividad')
        ->select('tipo_actividad.*',DB::raw('count(permiso.tipo_actividad)as total'))
        ->groupBy('tipo_actividad.id')
        ->get();
        //return $actividades;
        return view('administrador.actividades_comerciales')->with('actividades',$actividades);

   }

   public function detalles($id){
        $vendedor=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','tipo_actividad')
        ->where('tipo_actividad','=',$id)
        ->get();

        return $vendedor;
   }

    public function descargar_pdf_detalle($id){
        if($id==1){
            $nombre='Comercial Movil';
        }else if($id==2){
            $nombre='Comercial Semifija';
        }else if($id==3){
            $nombre='Comercial Movil Con Equipo Rodante';
        }else if($id==4){
            $nombre='Comercial Fija';
        }else if($id==5){
            $nombre='Comercios Establecidos';
        }else if($id==6){
            $nombre='Tianguis';
        }else if($id==7){
            $nombre='Prestacion de servicios';
        }
        $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','tipo_actividad')
        ->where('tipo_actividad','=',$id)
        ->get();

        $pdf=\PDF::loadView('Pdfs.vendedores_actividad',compact('vendedores','nombre'));
        return $pdf->stream();
       
    }

    public function descargar_pdf(){
        $actividades=Actividad_Comercial::join('permiso','tipo_actividad.id','=','permiso.tipo_actividad')
        ->select('tipo_actividad.*',DB::raw('count(permiso.tipo_actividad)as total'))
        ->groupBy('tipo_actividad.id')
        ->get();

        $pdf=\PDF::loadView('Pdfs.actividades_comerciales',compact('actividades'));
        return $pdf->stream();
    }

    public function buscar($dato){
            $actividades=Actividad_Comercial::join('permiso','tipo_actividad.id','=','permiso.tipo_actividad')
            ->select('tipo_actividad.*',DB::raw('count(permiso.tipo_actividad)as total'))
            ->where('tipo_actividad.id','=',$dato)
            ->orWhere('tipo_actividad.nombre_actividad','LIKE',"%$dato%")
            ->groupBy('tipo_actividad.id')
            ->get();

        return view('administrador.actividades_comerciales')->with('actividades',$actividades);
    }

    public function buscar_vendedor($dato){
        $vendedor=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','tipo_actividad')
        ->where('tipo_actividad','=',$dato)
        ->orWhere('tipo_actividad','=',$dato)
        ->orWhere('tipo_actividad','=',$dato)
        ->orWhere('tipo_actividad','=',$dato)
        ->get();

        return $vendedor;
    }

    public function descargar_excel(){
        return Excel::download(new ActividadExport, 'actividades_comerciales.xlsx');
    }

    public function descargar_excel_vendedor($id){
        return Excel::download(new ActividadVendedorExport($id), 'actividades_comerciales_vendedores.xlsx');
    }

}
