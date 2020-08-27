<?php

namespace App\Exports;

use App\Models\Observaciones;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class ObservacionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Observacion::all();
    }

    public function view(): View{

        $observaciones=Observaciones::all();

        return view('excel.observaciones',compact('observaciones'));
    }
}
