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
}
