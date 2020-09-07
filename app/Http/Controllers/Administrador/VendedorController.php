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
use Illuminate\Support\Facades\input;
use Validator;
use Response;
use App\Exports\VendedorExport;

class VendedorController extends Controller
{
    public function index(){
      $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
      ->select('users.*')
      ->paginate(10);
      $estado=Estado::all();
      $organizaciones=Organizacion::all();

      $permisos=Permisos::where('disponible','=','0')
      ->get();

      return view('Administrador.vendedores',compact('vendedores','estado','organizaciones','permisos'))->render();
    }

    public function insertar(Request $request){
        $rules= array(
          'name'=>['required','regex:/^[a-zA-Z\s]*$/','max:40'],
          'apellido_paterno'=>['required','regex:/^[a-zA-Z\s]*$/','max:30'],
          'apellido_materno'=>['required','regex:/^[a-zA-Z\s]*$/','max:30'],
          'sexo'=>'required',
          'fecha_nacimiento'=>'required',
          'id_municipio'=>'required',
          'email'=>['email','unique:users,email','required'],
          'password'=>['required','min:6'],
          'curp'=>'string|min:18|max:18',
          'id_organizacion'=>'required',
          'id_permiso'=>'required',
        );

        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $user= new User;
         
            $user->name=$request->input('name');
            $user->apellido_paterno=$request->input('apellido_paterno');
            $user->apellido_materno=$request->input('apellido_materno');
            $user->fecha_nacimiento=$request->input('fecha_nacimiento');
            $user->sexo=$request->input('sexo');
            $user->email=$request->input('email');
            $user->password=Hash::make($request->input('password'));
            $user->foto_perfil='profile.png';
            $user->id_municipio=$request->input('id_municipio');
            $user->status='1';

            $user->save();

            $ultimo=User::latest('id')->first();
            $id_ultimo=$ultimo->id;

            $vendedor=new Vendedor;

            $vendedor->rfc=$request->input('rfc');
            $vendedor->curp=$request->input('curp');
            $vendedor->id_organizacion=$request->input('id_organizacion');
            $vendedor->id_usuario=$id_ultimo;
            $vendedor->id_permiso=$request->input('id_permiso');
            $vendedor->save();

            $permiso=Permisos::find($request->input('id_permiso'));
            $permiso->disponible='1';
            $permiso->save();

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
