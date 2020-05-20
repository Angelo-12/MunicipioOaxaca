<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permisos;
use App\Models\Anuales;
use App\Models\Eventuales;
use App\Models\Provisionales;

class PermisosController extends Controller
{
    public function index(){
        $permisos=Permisos::join('anuales','permiso.id','=','anuales.id_permiso')
        ->paginate(10);
        return view('Administrador.permisos')->with('permisos',$permisos);
    }
}
