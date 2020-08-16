<?php

namespace App\Exports;

use App\Models\Actividad_Comercial;
use App\Models\Vendedor;
use App\Models\Permiso;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ActividadVendedorExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return Actividad_Comercial::all();
    }

    public function view(): View{

        $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','tipo_actividad')
        ->where('tipo_actividad','=',$this->id)
        ->get();

        return view('excel.actividad_vendedor',compact('vendedores'));
    }
}
