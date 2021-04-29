<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\input;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Models\Administrador_Secretaria;
use App\Models\Permisos;
use App\Models\Vendedor;
use App\Models\Zona;
use App\Models\Organizacion;
use App\Models\Calle;
use App\Models\Estado;
use Validator;
use Response;
use DB;

class UsuarioController extends Controller
{

   /**Funcion para que el usuario cambie su foto de perfil 1 ITERACION */
   public function cambiar_foto_perfil(Request $request,$id){
     
      $usuario=User::find($request->id);

      if($usuario->foto_perfil=="profile.png"){
        
      }else {
         \File::delete(public_path().'/img/'.$usuario->foto_perfil);
      }

		$imagen=$request->file('imagen');
		$nombre_imagen=time().$imagen->getClientOriginalName();
		$imagen->move(public_path().'/img/',$nombre_imagen);
      
      
      $usuario->foto_perfil=$nombre_imagen;
      $usuario->save();

       return redirect()->to('home');
   
   }

   public function insertar(Request $request){
      $rules = array(
         'name'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:40'],
         'apellido_paterno'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:30'],
         'apellido_materno'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:30'],
         'sexo'=>'required',
         'fecha_nacimiento'=>'required',
         'id_municipio'=>'required',
         'email'=>['email','unique:users,email','required'],
         'password'=>['required','min:6'],
         
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){
         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{
         $user= new User;
         
         $user->name=strtoupper($request->input('name'));
         $user->apellido_paterno=strtoupper($request->input('apellido_paterno'));
         $user->apellido_materno=strtoupper($request->input('apellido_materno'));
         $user->fecha_nacimiento=strtoupper($request->input('fecha_nacimiento'));
         $user->sexo=$request->input('sexo');
         $user->email=strtoupper($request->input('email'));
         $user->password=Hash::make($request->input('password'));
         $user->id_municipio=$request->input('id_municipio');
         $user->foto_perfil='profile.png';
         $user->status='1';

         $user->save();

         $ultimo=User::latest('id')->first();
         $id_ultimo=$ultimo->id+1;

         $administrador=new Administrador_Secretaria;
         $administrador->cargo='Administrador';
         $administrador->id_ultimo;

         $administrador->save();
    
         return response()->json($user);
         
      }
      
   }

   //Funcion pora insertar un nuevo administrador  validando los inputs correspondientes
   public function insertar_administrador(Request $request){
      $rules = array(
         'name'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:40'],
         'apellido_paterno'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:30'],
         'apellido_materno'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:30'],
         'sexo'=>'required',
         'fecha_nacimiento'=>'required',
         'id_municipio'=>'required',
         'email'=>['email','unique:users,email','required'],
         'password'=>['required','min:6'],
         
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){
         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{
         $user= new User;
         
         $user->name=strtoupper($request->input('name'));
         $user->apellido_paterno=strtoupper($request->input('apellido_paterno'));
         $user->apellido_materno=strtoupper($request->input('apellido_materno'));
         $user->fecha_nacimiento=$request->input('fecha_nacimiento');
         $user->sexo=$request->input('sexo');
         $user->email=strtoupper($request->input('email'));
         $user->password=Hash::make($request->input('password'));
         $user->foto_perfil='profile.png';
         $user->id_municipio=$request->input('id_municipio');
         $user->status='1';

         $user->save();

         $ultimo=User::latest('id')->first();
         $id_ultimo=$ultimo->id;
         
         $administrador=new Administrador_Secretaria;
         $administrador->cargo='Administrador';
         $administrador->id_usuario=$id_ultimo;

         $administrador->save();
    
         return response()->json($user);
         
      }
   }

   //Funcion para insertar una nueva secretaria y para validar los campos correspondientes de cada dato
   public function insertar_secretaria(Request $request){
      $rules = array(
         'name'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:40'],
         'apellido_paterno'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:30'],
         'apellido_materno'=>['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]*$/','max:30'],
         'sexo'=>'required',
         'fecha_nacimiento'=>'required',
         'id_municipio'=>'required',
         'email'=>['email','unique:users,email','required'],
         'password'=>['required','min:6'],
         
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){
         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{
         $user= new User;
         
         $user->name=strtoupper($request->input('name'));
         $user->apellido_paterno=strtoupper($request->input('apellido_paterno'));
         $user->apellido_materno=strtoupper($request->input('apellido_materno'));
         $user->fecha_nacimiento=$request->input('fecha_nacimiento');
         $user->sexo=$request->input('sexo');
         $user->email=strtoupper($request->input('email'));
         $user->password=Hash::make($request->input('password'));
         $user->foto_perfil='profile.png';
         $user->id_municipio=$request->input('id_municipio');
         $user->status='1';

         $user->save();

         $ultimo=User::latest('id')->first();
         $id_ultimo=$ultimo->id;
         
         $administrador=new Administrador_Secretaria;
         $administrador->cargo='Secretaria';
         $administrador->id_usuario=$id_ultimo;

         $administrador->save();
    
         return response()->json($user);
         
      }
   }

   //Actualizar un usuario
   public function editar(Request $request){
     
      $rules = array(
         'name'=>['required','regex:/^[a-zA-Z\s]*$/','max:40'],
         'apellido_paterno'=>['required','regex:/^[a-zA-Z\s]*$/','max:30'],
         'apellido_materno'=>['required','regex:/^[a-zA-Z\s]*$/','max:30'],
         'sexo'=>'required',
         'fecha_nacimiento'=>'required',
         'id_municipio'=>'required',
         'email'=>['email','required'],
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){
         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{
         $user=User::find($request->id);
         
         $user->name=strtoupper($request->input('name'));
         $user->apellido_paterno=strtoupper($request->input('apellido_paterno'));
         $user->apellido_materno=strtoupper($request->input('apellido_materno'));
         $user->fecha_nacimiento=$request->input('fecha_nacimiento');
         $user->sexo=$request->input('sexo');
         $user->email=strtoupper($request->input('email'));
         $user->id_municipio=$request->input('id_municipio');
         $user->status=$request->input('status');

         $user->save();

         return response()->json($user);
         
      }
   }

   public function actualizar_datos(Request $request){
      $rules = array(
         'name'=>['required','regex:/^[a-zA-Z\s]*$/','max:40'],
         'apellido_paterno'=>['required','regex:/^[a-zA-Z\s]*$/','max:30'],
         'apellido_materno'=>['required','regex:/^[a-zA-Z\s]*$/','max:30'],
      );

      $validator=Validator::make(input::all(),$rules);

      if($validator->fails()){

         return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
      }else{

         $user=User::find($request->id);
         
         $user->name=strtoupper($request->input('name'));
         $user->apellido_paterno=strtoupper($request->input('apellido_paterno'));
         $user->apellido_materno=strtoupper($request->input('apellido_materno'));
         if($request->input('password')!=NULL){
            $user->password=Hash::make($request->input('password'));
         }

         if($request->file('imagen')!=NULL){
            if($user->foto_perfil=="profile.png"){
        
            }else {
               \File::delete(public_path().'/img/'.$user->foto_perfil);

               $imagen=$request->file('imagen');
               $nombre_imagen=time().$imagen->getClientOriginalName();
               $imagen->move(public_path().'/img/',$nombre_imagen);

               $user->foto_perfil=$nombre_imagen;
            }
         }
        
         $user->save();

         return redirect()->to('home');
         
      }
   }

   public function eliminar(Request $request){
      $user=User::find($request->id);

      $user->status='0';

      $user->save();

      return response()->json($user);      
   }

   public function buscar($dato){

      $tipo="Administradores";

      $dato2 = '%'.$dato.'%';

      $sql="select *,count(u.id)as total from users u inner join admin_secretaria a  on u.id= a.id_usuario 
      where a.cargo like '%Administrador%' and (u.name like ? OR u.apellido_paterno like ? OR u.apellido_materno like ?
      OR u.email like ? OR u.sexo = ? )";
      
      $usuarios = DB::select($sql,array($dato2,$dato2,$dato2,$dato2,$dato2));
      $estado=Estado::all();

      return view('Administrador.busqueda_usuarios',compact('usuarios','estado','tipo'))->render();

   }

   public function insertar_rol(Request $request){
      $usuario=Administrador_Secretaria::where('id_usuario','=',$request->input('id_usuario'))->first();

      if(Administrador_Secretaria::where('id_usuario','=',$request->input('id_usuario'))->exists()){

         $usuario->id_usuario = $request->input('id_usuario');;
         $usuario->cargo = $request->input('cargo');
         $usuario->save();
         return response()->json($usuario);
         
      }else{
         $rules = array(
            'cargo'=>['required','alpha','max:40'],
         );
   
         $validator=Validator::make(input::all(),$rules);
   
         if($validator->fails()){
            return response::json(array('errors'=>$validator->getMessageBag()->toarray()));
         }else{
            $rol=new Administrador_Secretaria;
            $rol->cargo=$request->input('cargo');
            $rol->id_usuario=$request->input('id_usuario');
   
            $rol->save();
       
            return response()->json($rol);
   
         }
      }

   }

   //Funcion para obtener el ultimo registro insertado en la tabla usuarios solo necesitamos el id
   public function ultimo(){
      $ultimo=User::latest('id')->first();
      $id = $ultimo->id+1;
      return $id;
   }

   //Nos muestra la pagina principal de los administradopres
   public function index(){

      $id=Auth::user()->id;
      $rol = Administrador_Secretaria::where('id_usuario','=',$id)->get();

      $tipo="Administradores";
      $usuarios=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
      ->where('admin_secretaria.cargo','=','Administrador')
      ->paginate(10);
     
      $estado=Estado::all();
      return view('Administrador.usuarios',compact('usuarios','estado','tipo','rol'))->render();
   }

   public function exportar_pdf_administrador(){
      $usuarios=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
      ->where('admin_secretaria.cargo','=','Administrador')
      ->get();

      $pdf=\PDF::loadView('Pdfs.usuarios',compact('usuarios'));
      return $pdf->stream();
   }

   public function descargar_excel(){
      return Excel::download(new UsersExport, 'administradores.xlsx');

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
      
   }
   
   //Funcion que regresa los detalles del usuario buscado, la busqueda se hace mediante el id
   public function ver_detalle($id){		
      $vendedores=Administrador_Secretaria::join('users','admin_secretaria.id','=','users.id')
      ->select('name','apellido_paterno','apellido_materno','email','cargo')->get();
      return response()->json(['admin'=>$usuario]);
      
   }
   
   public function descargar_csv(){
      return Excel::download(new UsersExport,'users.xlsx');
   }
}