<?php

namespace App\Exports;

use App\Models\Zona;
use App\Models\Permiso;
use App\Models\Colonia;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class ZonaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Zona::all();
    }

    public function view(): View{
        $zonas=Zona::join('colonia','zona.id','=','colonia.id_zona')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->select('zona.*',DB::raw('count(permiso.id)as total'))
        ->groupBy('zona.id')
        ->get();

        return view('excel.zonas',compact('zonas'));
    }

}
