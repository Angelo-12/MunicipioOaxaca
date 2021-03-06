<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Response;
use App\User;
use App\Models\Permiso;
use App\Models\Vendedor;
use App\Models\ActividadComercial;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ActividadExport;
use App\Exports\ActividadVendedorExport;
use App\Exports\ListaActividadesExport;


class ActividadesComercialesController extends Controller
{
   
   public function index(){
        $actividades=ActividadComercial::join('permiso','actividadcomercial.id','=','permiso.tipo_actividad')
        ->select('actividadcomercial.*',DB::raw('count(permiso.tipo_actividad)as total'))
        ->groupBy('actividadcomercial.id')
        ->get();

        return view('administrador.actividades_comerciales')->with('actividades',$actividades);
   }

   public function detalles($id){

    $actividades=ActividadComercial::join('permiso','actividadcomercial.id','=','permiso.tipo_actividad')
    ->join('vendedor','vendedor.id_permiso','=','permiso.id')
    ->join('users','users.id','=','vendedor.id_usuario')
    ->where('actividadcomercial.id','=',$id)
    ->get();

    return $actividades;

   }

   public function mostrar_actividades(){
       $actividades=ActividadComercial::all();

       return $actividades;
   }

   public function descargar_actividades(){
        $actividades=ActividadComercial::all();

        $pdf=\PDF::loadView('Pdfs.listar_actividades',compact('actividades'));
        return $pdf->stream();
   }

   public function descargar_excel_actividades(){
        return Excel::download(new ListaActividadesExport, 'lista_actividades.xlsx');
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
        $vendedores=ActividadComercial::join('permiso','actividadcomercial.id','=','permiso.tipo_actividad')
        ->join('vendedor','vendedor.id_permiso','=','permiso.id')
        ->join('users','vendedor.id_usuario','=','users.id')
        ->where('actividadcomercial.id','=',$id)
        ->get();

        $pdf=\PDF::loadView('Pdfs.vendedores_actividad',compact('vendedores','nombre'));
        return $pdf->stream();
       
    }

    public function descargar_pdf(){
        $actividades=ActividadComercial::join('permiso','actividadcomercial.id','=','permiso.tipo_actividad')
        ->select('actividadcomercial.*',DB::raw('count(permiso.tipo_actividad)as total'))
        ->groupBy('actividadcomercial.id')
        ->get();


        $pdf=\PDF::loadView('Pdfs.actividades_comerciales',compact('actividades'));
        return $pdf->stream();
    }

    public function buscar($dato){
            $actividades=ActividadComercial::join('permiso','actividadcomercial.id','=','permiso.tipo_actividad')
            ->select('actividadcomercial.*',DB::raw('count(permiso.tipo_actividad)as total'))
            ->where('actividadcomercial.id','=',$dato)
            ->orWhere('actividadcomercial.nombre_actividad','LIKE',"%$dato%")
            ->groupBy('actividadcomercial.id')
            ->get();

        return view('administrador.actividades_comerciales')->with('actividades',$actividades);
    }

    public function buscar_vendedor($dato,$id){
        $dato2 = '%'.$dato.'%';

        $sql="select * from actividadcomercial a inner join permiso p 
        on a.id= p.tipo_actividad 
        inner join vendedor v on v.id_permiso=p.id 
        inner join users u on u.id=v.id_usuario
        where a.id=? and (v.rfc like ? OR v.curp like ? OR u.name like ?)";
        
        return  DB::select($sql,array($id,$dato2,$dato2,$dato2));
       
    }

    public function descargar_excel(){
        return Excel::download(new ActividadExport, 'actividades_comerciales.xlsx');
    }

    public function descargar_excel_vendedor($id){
        return Excel::download(new ActividadVendedorExport($id), 'actividades_comerciales_vendedores.xlsx');
    }

}
