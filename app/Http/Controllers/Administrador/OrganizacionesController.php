<?php

namespace App\Http\Controllers\Administrador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organizacion;
use App\Models\Vendedor;
use App\Exports\OrganizacionExport;
use App\Exports\OrganizacionVendedorExport;
use Validator;
use Response;
use Illuminate\Support\Facades\Input;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class OrganizacionesController extends Controller
{
    //Funcion que muyestra la pagina principal de las organizaciones
    public function index(){
        //$organizaciones=Organizacion::paginate(10);
        $organizaciones=Organizacion::join('vendedor','organizacion.id','=','vendedor.id_organizacion')
        ->select('organizacion.*',DB::raw('count(vendedor.id_organizacion)as total'))
        ->where('organizacion.status','=',1)
        ->groupBy('organizacion.id')
        ->paginate(10);
        return view('Administrador.organizaciones')->with('organizaciones',$organizaciones);
    }

    //Funcion para insertar una nueva organizacion
    public function insertar(Request $request){

        $rules= array(
           'nombre_organizacion'=>'required',
           'nombre_dirigente'=>'required',
        );

        $validator = Validator::make ( Input::all(), $rules);
        if ($validator->fails())
            return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));
    
        else {
            $org=new Organizacion;

            $org->nombre_organizacion=$request->input('nombre_organizacion');
            $org->nombre_dirigente=$request->input('nombre_dirigente');
            $org->status='1';
            $org->save();
    
            return response()->json($org);
        }
    }

    //Funcion para editar una organizacion validando cada uno de los campos sean correctos
    public function editar(Request $request){
        $rules= array(
            'nombre_organizacion'=>'required',
            'nombre_dirigente'=>'required',
         );
 
         $validator = Validator::make ( Input::all(), $rules);
         if ($validator->fails())
             return Response::json(array('errors'=> $validator->getMessageBag()->toarray()));

        else{
            $org = Organizacion::find ($request->id);
            $org->nombre_organizacion = $request->nombre_organizacion;
            $org->nombre_dirigente = $request->nombre_dirigente;
            $org->save();
            return response()->json($org);
        }
    }

    public function eliminar(Request $request){
        $org = Organizacion::find ($request->id);
        $org->status='0';
        $org->save();
        return response()->json($org);
    }

    public function detalle_organizacion($id){
        $vendedores=Vendedor::join('users','users.id','=','vendedor.id_usuario')
        ->where('vendedor.id_organizacion','=',$id)
        ->get();
        return $vendedores;
    }

    public function descargar_pdf_detalle($id){
        $organizacion=Organizacion::where('id','=',$id)
        ->get();

        $vendedores=Vendedor::join('users','users.id','=','vendedor.id_usuario')
        ->where('vendedor.id_organizacion','=',$id)
        ->get();

        $pdf=\PDF::loadView('Pdfs.vendedores_organizacion',compact('vendedores','organizacion'));

        return $pdf->stream();
    }

    public function descargar_pdf(){
        $organizaciones=Organizacion::join('vendedor','organizacion.id','=','vendedor.id_organizacion')
        ->select('organizacion.*',DB::raw('count(vendedor.id_organizacion)as total'))
        ->groupBy('organizacion.id')
        ->get();

        $pdf=\PDF::loadView('Pdfs.organizaciones',compact('organizaciones'));

        return $pdf->stream();
    }

    public function buscar($dato){
        $organizaciones=Organizacion::join('vendedor','organizacion.id','=','vendedor.id_organizacion')
        ->select('organizacion.*',DB::raw('count(vendedor.id_organizacion)as total'))
        ->where('organizacion.status','=',1)
        ->where('organizacion.id','=',$dato)
        ->orWhere('organizacion.nombre_organizacion','LIKE','%'.$dato.'%')
        ->orWhere('organizacion.nombre_dirigente','LIKE','%'.$dato.'%')
        ->groupBy('organizacion.id')
        ->paginate(10);

        return view('Administrador.organizaciones')->with('organizaciones',$organizaciones);
    }

    public function buscar_vendedor($id,$dato){

        $dato2 = '%'.$dato.'%';

        $sql="select * from users u inner join vendedor v on u.id= v.id_usuario 
        where v.id_organizacion=? and (v.rfc like ? OR v.curp like ? OR u.name like ?)";
        
        return  DB::select($sql,array($id,$dato2,$dato2,$dato2));

    }

    public function descargar_excel(){
        return Excel::download(new OrganizacionExport, 'organizaciones.xlsx');

    }

    public function descargar_excel_vendedor($id){
        return Excel::download(new OrganizacionVendedorExport($id), 'organizaciones_vendedor.xlsx');

    }
}
