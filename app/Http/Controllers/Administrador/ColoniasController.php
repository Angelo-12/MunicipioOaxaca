<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Colonia;
use App\Models\Permiso;
use DB;

class ColoniasController extends Controller
{
    public function detalle($id){
        $colonia=Colonia::join('permiso','colonia.id','=','permiso.id_colonia')
        ->select('colonia.*',DB::raw('count(permiso.id_colonia)as total'))
        ->groupBy('colonia.id')
        ->where('colonia.id','=',$id)
        ->get();

        return $colonia;
    }

    public function dato($id){
        $colonia=Colonia::where('id','=',$id)
        ->get();

        return $colonia;
    }

    public function buscar($id,$dato){

        $dato2 = '%'.$dato.'%';

        $sql="select c.id,c.nombre,codigo_postal,count(p.id_colonia)as total from colonia c inner join permiso p 
        on c.id = p.id_colonia 
        where c.id_agencia=? and (c.id=? OR c.nombre like ? OR c.codigo_postal = ?)
        group by c.id";
        
        return  DB::select($sql,array($id,$dato2,$dato2,$dato2));
       

    }

}
