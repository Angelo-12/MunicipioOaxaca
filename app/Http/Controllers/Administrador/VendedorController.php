<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use App\Models\Estado;
use App\Models\Organizacion;
use App\Models\Permisos;
class VendedorController extends Controller
{
    public function index(){
      $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
      ->select('users.*')
      ->paginate(10);
      $estado=Estado::all();
      $organizaciones=Organizacion::all();
      $permisos=Permisos::where('asignado','=','0')
      ->get();

      //return $permisos;
      return view('Administrador.vendedores',compact('vendedores','estado','organizaciones','permisos'))->render();
    }

    public function insertar(Request $request){
        $rules= array(
          'rfc'=>'string|min:12|max:13',
          'curp'=>'string|min:18|max:18',
          'id_usuario'=>'required',
          'id_organizacion'=>'required',
          'id_permiso'=>'required',
        );

        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $vendedor=new Vendedor;

            $vendedor->rfc=$request->input('nombre_organizacion');
            $vendedor->curp=$request->input('nombre_dirigente');
            $vendedor->save();
    
            return response()->json($vendedor);
        }
    }

    public function descargar_pdf(){
      $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
      ->select('users.*')
      ->get();

      $pdf=\PDF::loadView('Pdfs.vendedores',compact('vendedores'));
      return $pdf->stream();
    }

    public function editar(){
        
    }
}
