<?php

namespace App\Exports;

use App\Models\Zona;
use App\Models\Permiso;
use App\Models\Colonia;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ZonaVendedorExport implements FromView
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
        return Zona::all();
    }

    public function view(): View{
        $zonas=Zona::join('colonia','zona.id','=','colonia.id_zona')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->join('vendedor','permiso.id','=','vendedor.id_permiso')
        ->join('users','vendedor.id_usuario','=','users.id')
        ->where('zona.id','=',$this->id)
        ->get();

        return view('excel.zonas_vendedor',compact('zonas'));
    }
}
