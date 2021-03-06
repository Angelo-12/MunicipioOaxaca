<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Administrador_Secretaria;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SecretariaExport;
use DB;
use Auth;

class Administrador_SecretariaController extends Controller
{
    //Funcion que muestra la pagina principal en donde se muestran todas las secretarias disponibles y activas que hay en el sistema
    public function index(){

        $id=Auth::user()->id;
        $rol = Administrador_Secretaria::where('id_usuario','=',$id)->get();

        $usuarios=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
        ->where('admin_secretaria.cargo','=','Secretaria')
        ->paginate(10);
       
        $estado=Estado::all();
        return view('Administrador.administrativos',compact('usuarios','estado','rol'))->render();
     }

     public function buscar($dato){
     
        $dato2 = '%'.$dato.'%';
  
        $sql="select *,count(u.id)as total from users u inner join admin_secretaria a  on u.id= a.id_usuario 
        where a.cargo like '%Secretaria%' and (u.name like ? OR u.apellido_paterno like ? OR u.apellido_materno like ?
        OR u.email like ? OR u.sexo = ? )";
        
        $usuarios = DB::select($sql,array($dato2,$dato2,$dato2,$dato2,$dato2));
        $estado=Estado::all();

        return view('Administrador.busqueda_administrativos',compact('usuarios','estado'))->render();
     }
  
     //Funcion para visualizar en pdf a las secretarias existentes en el sistema web
     public function descargar_pdf(){
        $secretarias=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
        ->where('admin_secretaria.cargo','=','Secretaria')
        ->get();

        $pdf=\PDF::loadView('Pdfs.secretarias',compact('secretarias'));

        return $pdf->stream();
    }

    public function descargar_excel(){
        return Excel::download(new SecretariaExport, 'secretaria.xlsx');
    }

}
