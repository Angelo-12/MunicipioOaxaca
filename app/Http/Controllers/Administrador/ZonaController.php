<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Zona;
class ZonaController extends Controller
{
    public function mostrar(){
        $zonas=Zona::all();
        return view('Administrador.zonas_comercializacion')->with('zonas',$zonas);
    }
}
