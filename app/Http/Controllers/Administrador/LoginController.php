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
        return view('login');
    }

    /**Funcion que permite al usuario loguarse validando el usuario y el password vez 1 ITERACION */
    public function login(){
        $credenciales =$this->Validate(request(),
        [
            'email' => 'required|email',
            'password'=>'required',
        ]);

        if(Auth::attempt($credenciales)){
            return redirect()->route('home');
        }else {
            return redirect()->back()->withErrors(['email'=>'usuario o password incorrecto'])
            ->withInput(request(['email']));
        }
    }

}
