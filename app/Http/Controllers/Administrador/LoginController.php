<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class LoginController extends Controller
{
    /**Muestra la vista principal del login 1 ITERACION */
    public function index(){
        return view('login2');
    }

    /**Funcion que permite al usuario loguarse validando el usuario y el password vez 1 ITERACION */
    public function login(Request $request){
        
        $user=User::join('admin_secretaria','users.id','=','admin_secretaria.id_usuario')
        ->where('users.email','=',$request->email)
        ->first();

        if($user!=NULL){
            if($user->status==1){
                $credenciales =$this->Validate(request(),
                [
                    'email' => 'required|email',
                    'password'=>'required',
                ]);
        
                if(Auth::attempt($credenciales)){
                    return redirect()->route('home');
                }else {
                    return redirect()->back()->withErrors(['email'=>'usuario o contraseña incorrecto'])
                    ->withInput(request(['email']));
                }
            }else{
                return redirect()->back()->withErrors(['email'=>'el usuario ha sido dado de baja']);
            }
        }else {
            return redirect()->back()->withErrors(['email'=>'usuario o contraseña incorrecto']);
        }
       
        
    }

}
