<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\input;

class UsuarioController extends Controller
{
   public function crearUsuario(Request $request){
      $rules = array(
         'name'=>'required',
         'apellido_paterno'=>'required',
         'apellido_materno'=>'required',
         'fecha_nacimiento'=>'required',
         'email'=>'required|email',
         'password'=>'required|min:6'
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){
         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{
         $nombre=$request->name;
         $apellido_paterno=$request->apellido_paterno;
         $apellido_materno=$request->apellido_materno;
         $fecha_nacimiento=$request->fecha_nacimiento;
         $sexo=$request->sexo;
         $email=$request->email;
         $password=$request->password;
         $id_municipio=$request->id_municipio;

         User::create(['name'=>$nombre,'apellido_paterno'=>$apellido_paterno,'apellido_materno'=>$apellido_materno,
         'fecha_nacimiento'=>$fecha_nacimiento,'sexo'=>$sexo,'email'=>$email,'password'=>$password,'id_municipio'=>$id_municipio
         ]);
      }
      
   }

   public function mostrar(){
      $usuarios=User::all();
      return view('Administrador.Usuarios')->with('usuarios',$usuarios);
   }

   public function listarUsuarios(){
      $usuario=User::all();
      return $usuario;
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
