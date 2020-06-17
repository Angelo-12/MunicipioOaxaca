<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

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
