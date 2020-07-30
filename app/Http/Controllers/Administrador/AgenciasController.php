<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agencia;
use App\Models\Colonia;

class AgenciasController extends Controller
{
   
    public function index(){
        //$agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        //->paginate(10);
        $agencias=Agencia::paginate(10);
        return view('Administrador.agencias')->with('agencias',$agencias);

    }

    public function detalle($id){
        $agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        ->where('agencia.id','=',$id)
        ->get();

        return $agencias;
    }

    public function descargar_pdf(){

    }

    public function descargar_csv(){

    }
}
