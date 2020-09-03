<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use App\Models\Estado;
use App\Models\Organizacion;
use App\Models\Permisos;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\VendedorExport;

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

    public function descargar_excel(){
      return Excel::download(new VendedorExport, 'vendedores.xlsx');
    }

    /**Funcion para cambiar el password a partir de un correo electronico dado */
    public function actualizar_password(Request $request){
      $user=User::where('email','=',$request->email)
      ->first();

      $user->password=Hash::make($request->password);

      $user->save();

      return $user->email;
    }

    public function buscar($dato){
        $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->select('users.*')
        ->where('vendedor.id','=',$dato)
        ->orWhere('vendedor.rfc','LIKE','%'.$dato.'%')
        ->orWhere('vendedor.curp','LIKE','%'.$dato.'%')
        ->orWhere('users.name','LIKE','%'.$dato.'%')
        ->orWhere('users.apellido_paterno','LIKE','%'.$dato.'%')
        ->orWhere('users.apellido_materno','LIKE','%'.$dato.'%')
        ->orWhere('users.email','LIKE','%'.$dato.'%')
        ->paginate(10);

        $estado=Estado::all();
        $organizaciones=Organizacion::all();

        $permisos=Permisos::where('asignado','=','0')
        ->get();

      return view('Administrador.vendedores',compact('vendedores','estado','organizaciones','permisos'))->render();
    
    }
}
