<?php

namespace App\Exports;

use App\Models\ActividadComercial;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ListaActividadesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ActividadComercial::all();
    }

    public function view(): View{

        $actividades=ActividadComercial::all();
        return view('excel.actividades_comerciales',compact('actividades'));
    }
}
