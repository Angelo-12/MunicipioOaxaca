<?php

namespace App\Exports;

use App\Models\Actividad_Comercial;
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
        return Actividad_Comercial::all();
    }

    public function view(): View{

        $actividades=Actividad_Comercial::join('permiso','tipo_actividad.id','=','permiso.tipo_actividad')
        ->select('tipo_actividad.*',DB::raw('count(permiso.tipo_actividad)as total'))
        ->groupBy('tipo_actividad.id')
        ->get();

        return view('excel.actividades_comerciales',compact('actividades'));
    }
}
