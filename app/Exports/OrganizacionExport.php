<?php

namespace App\Exports;

use App\Models\Organizacion;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class OrganizacionExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Organizacion::all();
    }

    public function view(): View{

        $organizaciones=Organizacion::join('vendedor','organizacion.id','=','vendedor.id_organizacion')
        ->select('organizacion.*',DB::raw('count(vendedor.id_organizacion)as total'))
        ->where('organizacion.status','=',1)
        ->groupBy('organizacion.id')
        ->get();

        return view('excel.organizaciones',compact('organizaciones'));
    }
}
