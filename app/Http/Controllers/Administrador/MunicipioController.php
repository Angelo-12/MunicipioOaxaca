<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Municipio;

class MunicipioController extends Controller
{
    public function listarMunicipios($id){
        return Municipio::where('id_estado','=',$id)->get();
    }
    
}
