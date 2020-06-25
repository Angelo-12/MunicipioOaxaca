<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Models\Administrador_Secretaria;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=Auth::user()->id;
        $rol = Administrador_Secretaria::where('id_usuario','=',$id)->get();
        $user=User::find($id)->first();
        $usuarios=json_decode($user,true);
    
        $fecha_nacimiento= $usuarios['fecha_nacimiento'];
        $edad=\Carbon\Carbon::parse($fecha_nacimiento)->age;
        //return $edad;
        return view('home')->with('user',$user)->with('rol',$rol)->with('edad',$edad);
    }
}
