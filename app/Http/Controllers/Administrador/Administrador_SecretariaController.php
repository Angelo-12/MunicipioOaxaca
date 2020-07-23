<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Administrador_Secretaria;

class Administrador_SecretariaController extends Controller
{
    //Funcion que muestra la pagina principal en donde se muestran todas las secretarias disponibles y activas que hay en el sistema
    public function index(){
        $usuarios=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
        ->where('admin_secretaria.cargo','=','Secretaria')
        ->paginate(10);
       
        $estado=Estado::all();
        return view('Administrador.administrativos',compact('usuarios','estado'))->render();
     }
  
     //Funcion para visualizar en pdf a las secretarias existentes en el sistema web
     public function descargar_pdf(){
        $secretarias=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
        ->where('admin_secretaria.cargo','=','Secretaria')
        ->get();

        $pdf=\PDF::loadView('Pdfs.secretarias',compact('secretarias'));

        return $pdf->stream();
    }

}
