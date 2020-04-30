<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\input;
use App\Models\Administrador_Secretaria;
use App\Models\Permisos;
use App\Models\Vendedor;
use App\Models\Zona;
use App\Models\Organizacion;
use App\Models\Calle;
use App\Models\Estado;
class UsuarioController extends Controller
{
   public function insertar(Request $request){
      $rules = array(
         'name'=>'required|string|max:40',
         'apellido_paterno'=>'required|string|max:30',
         'apellido_materno'=>'required|string|max:30',
         'fecha_nacimiento'=>'required',
         'id_municipio'=>'required',
         'email'=>'required|email|unique',
         'password'=>'required|min:6'
         
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){
         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{
         $user= new User;
         
         $user->name=$request->input('name');
         $user->apellido_paterno=$request->input('apellido_paterno');
         $user->apellido_materno=$request->input('apellido_materno');
         $user->fecha_nacimiento=$request->input('fecha_nacimiento');
         $sexo=$request->input('sexo');
         $user->email=$request->input('email');
         $user->password=Hash::make($request->input('password'));
         $user->id_municipio=$request->input('id_municipio');

         $user->save();
    
         return response()->json($user);
         
      }
      
   }

   


   public function mostrar(){
      //$usuarios=User::all();
      $usuarios=User::paginate(10);
      $estado=Estado::all();
      return view('Administrador.usuarios',compact('usuarios','estado'))->render();
   }

   public function fetch_data(Request $request){
      if($request->ajax()){
         $usuarios=User::paginate(10);
         return view('Administrador.usuarios',compact('usuarios'))->render();
      }
   }
   public function iniciarsesion($id){
      $usuario=Administrador_Secretaria::join('users','admin_secretaria.id','=','users.id')
      ->join('municipio','users.id_municipio','=','municipio.id_municipio')
      ->select('name','apellido_paterno','apellido_materno','email','cargo','nombre')
      ->where('id_admin_secretaria','=',$id)
      ->get();
      return response()->json(['admin'=>$usuario]);

   }
   public function listarOrganizaciones(){
      $organizacion=Organizacion::all();
      $data=$organizacion->toArray();
      return response(["Organizacion"=>$data]);
      ;
      
   }
   
   public function listarzonascomerciales(){
      $zonas=Zona::all();
      $data=$zonas->toArray();
      return response(["zonas"=>$data]);
      ;
      
   }
   public function listaractividadesbien(){
      $actividades=Actividad::all();
      $data=$actividades->toArray();
      return response(["actividades"=>$data]);
   }


   public function listaractividades(){
      $data=Permisos::select('tipo_actividad')
      ->where('tipo_actividad','=','Ambulante')
      ->count('tipo_actividad','=','Ambulante');
      return response(["permisos"=>$data]);
      ;
      
   }
   public function listarvendedoresorganizacion($id){
      $vendedores= Organizacion::join('vendedor','organizacion.id_organizacion','=','vendedor.id_organizacion')
      ->join('users','vendedor.id','=','users.id')
      ->join('permiso','vendedor.id_permiso','=','permiso.id_permiso')
      ->join('calle','permiso.id_calle','=','calle.id_calle')
      ->join('zona','calle.id_zona','=','zona.id_zona')
      ->select('id_vendedor','name','apellido_paterno','apellido_materno','nombre_organizacion','tipo_actividad','giro','latitud','longitud','zona.nombre')
      ->where('organizacion.id_organizacion','=',$id)
      ->get();
      return response(["permisos"=>$vendedores]);
      ;  
   }
   public function listarvendedoreszonas($id){
      $vendedores=Zona::join('calle','zona.id_zona','=','calle.id_zona')
      ->join('permiso','calle.id_calle','=','permiso.id_calle')
      ->join('vendedor','permiso.id_permiso','=','vendedor.id_permiso')
      ->join('organizacion','vendedor.id_organizacion','=','organizacion.id_organizacion')
      ->join('users','vendedor.id','=','users.id')
      ->select('zona.id_zona','vendedor.id_vendedor','name','apellido_paterno','apellido_materno','nombre_organizacion','tipo_actividad','giro','latitud','longitud','zona.nombre')
      ->where('zona.id_zona','=',$id)
      ->get();
      return response(["zonasvend"=>$vendedores]);
   }

   public function listarvendedores(){
      $vendedores= Vendedor::join('users','vendedor.id','=','users.id')
      ->join('organizacion','vendedor.id_organizacion','=','organizacion.id_organizacion')
      ->join('permiso','vendedor.id_permiso','=','permiso.id_permiso')
      ->join('calle','permiso.id_calle','=','calle.id_calle')
      ->join('zona','calle.id_zona','=','zona.id_zona')
      ->select('id_vendedor','name','apellido_paterno','apellido_materno','nombre_organizacion','tipo_actividad','giro','latitud','longitud','zona.nombre')
      ->orderby('id_vendedor')
      ->get();
      return response(["vendedores"=>$vendedores]);
      ;
      
   }
   
   public function ver_detalle($id){
		
      $vendedores=Administrador_Secretaria::join('users','admin_secretaria.id','=','users.id')
      ->select('name','apellido_paterno','apellido_materno','email','cargo')->get();
      return response()->json(['admin'=>$usuario]);
      
	}
}
