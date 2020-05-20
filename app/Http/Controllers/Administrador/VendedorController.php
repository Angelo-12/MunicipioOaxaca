<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vendedor;
use App\Models\Estado;
class VendedorController extends Controller
{
    public function index(){
      $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
      ->select('vendedor.*')
      ->paginate(10);
      $estado=Estado::all();
      return view('Administrador.vendedores',compact('vendedores','estado'))->render();
    }

    public function insertar(Request $request){

    }

    public function editar(){
        
    }
}
