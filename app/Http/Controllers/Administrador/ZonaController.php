<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zona;
use App\Models\Permisos;
use App\Models\Vendedor;
use App\Models\Calle;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ZonaExport;
use DB;
class ZonaController extends Controller
{
    //Funcion que regresa la pagina principal de las zonas de comercializacion
    public function index(){
        $zonas=Zona::join('colonia','zona.id','=','colonia.id_zona')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->select('zona.*',DB::raw('count(permiso.id)as total'))
        ->groupBy('zona.id')
        ->get();

        return view('Administrador.zonas_comercializacion_inicio')->with('zonas',$zonas);
    }

    //Muestra el detalle de cada una de las zonas 
    public function detalle_zona($id){
        if($id==1){
            $zona="PERMITIDA";
        }else if($id==2){
            $zona="RESTRINGIDA";
        }else if($id==3){
            $zona="PROHIBIDA";
        }else if($id==4){
            $zona="SIN ZONA";
        }
        $vendedor=Vendedor::join('permiso','permiso.id','=','vendedor.id_permiso')
        ->join('users','users.id','vendedor.id_usuario')
        //->join('calle','calle.id','=','permiso.id_calle')
        ->join('zona','zona.id','=','calle.id_zona')
        ->where('zona.id','=',$id)
        ->select('users.*',DB::raw('permiso.*,vendedor.*'))
        ->paginate(10);

        return view('Administrador.detalle_zona')->with('vendedor',$vendedor)->with('zona',$zona);
    }

    public function detalle($id){
        $zonas=Zona::join('colonia','zona.id','=','colonia.id_zona')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->join('vendedor','permiso.id','=','vendedor.id_permiso')
        ->join('users','vendedor.id_usuario','=','users.id')
        ->where('zona.id','=',$id)
        ->get();

        return $zonas;

    }

    //Muestra un pdf con las zonas y el detalle de cada una de ellas y asi como tambien muestra la opcion para descargalos
    public function descargar_pdf(){
        $zonas=Permisos::join('calle','permiso.id_calle','=','calle.id')
        ->join('zona','zona.id','=','calle.id_zona')
        ->select('zona.*',DB::raw('count(permiso.id)as total'))
        ->groupBy('zona.id')
        ->get();

        $pdf=\PDF::loadView('Pdfs.zonas',compact('zonas'));

        return $pdf->stream();
    }

    public function descargar_pdf_detalle($id){
        $zonas=Zona::join('colonia','zona.id','=','colonia.id_zona')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->join('vendedor','permiso.id','=','vendedor.id_permiso')
        ->join('users','vendedor.id_usuario','=','users.id')
        ->where('zona.id','=',$id)
        ->get();

        if($id==1){
            $nombre="PERMITIDA";
        }else if($id==2){
            $nombre="RESTRINGIDA";
        }else if($id==3){
            $nombre="PROHIBIDA";
        }

        $pdf=\PDF::loadView('Pdfs.vendedores_zona',compact('zonas','nombre'));

        return $pdf->stream();
    }

    public function buscar($dato){
        $zonas=Zona::where('id','=',$dato)
        ->orWhere('nombre','LIKE','%'.$dato.'%')
        ->get();
        return view('Administrador.zonas_comercializacion_inicio')->with('zonas',$zonas);
    }

    public function descargar_excel(){
        return Excel::download(new ZonaExport, 'ZonasComercializacion.xlsx');
    }

}
