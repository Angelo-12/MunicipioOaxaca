<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colonia;

class ColoniasController extends Controller
{
    public function detalle($id){
        $colonia=Colonia::where('id','=',$id)
        ->get();

        return $colonia;
    }
}
