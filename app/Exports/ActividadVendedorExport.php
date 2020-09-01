<?php

namespace App\Exports;

use App\Models\ActividadComercial;
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
        return ActividadComercial::all();
    }

    public function view(): View{

        $vendedores=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->join('permiso','permiso.id','=','vendedor.id_permiso')
        ->join('actividadcomercial','actividadcomercial.id','=','permiso.tipo_actividad')
        ->where('actividadcomercial.id','=',$this->id)
        ->get();

        return view('excel.actividad_vendedor',compact('vendedores'));
    }
}
