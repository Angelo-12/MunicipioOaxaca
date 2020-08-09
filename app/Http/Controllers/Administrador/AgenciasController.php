<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agencia;
use App\Models\Colonia;
use App\Models\Permiso;
use DB;
use Maatwebsite\Excel\Facades\Excel;
//use Maatwebsite\Excel\Excel;
use App\Exports\AgenciaExport;

class AgenciasController extends Controller
{
   
    public function index(){
        $agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        ->select('agencia.*',DB::raw('count(colonia.id_agencia)as total'))
        ->groupBy('agencia.id')
        ->paginate(10);

        //return $agencias;
        return view('Administrador.agencias')->with('agencias',$agencias);

    }

    public function detalle($id){
        $agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->select('colonia.*',DB::raw('count(permiso.id_colonia)as total'))
        ->groupBy('colonia.id')
        ->where('agencia.id','=',$id)
        ->get();

        return $agencias;
    }

    public function descargar_pdf(){
        $agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        ->select('agencia.*',DB::raw('count(colonia.id_agencia)as total'))
        ->groupBy('agencia.id')
        ->get();

        $pdf=\PDF::loadView('Pdfs.agencias',compact('agencias'));

        return $pdf->stream();

    }

    public function descargar_excel(){
        return Excel::download(new AgenciaExport, 'agencias.xlsx');
    }
}
