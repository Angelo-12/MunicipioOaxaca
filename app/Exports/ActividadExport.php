<?php

namespace App\Exports;

use App\Models\ActividadComercial;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ActividadExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ActividadComercial::all();
    }

    public function view(): View{

        $actividades=ActividadComercial::join('permiso','actividadcomercial.id','=','permiso.tipo_actividad')
        ->select('actividadcomercial.*',DB::raw('count(permiso.tipo_actividad)as total'))
        ->groupBy('actividadcomercial.id')
        ->get();

        return view('excel.actividades_comerciales',compact('actividades'));
    }
}
