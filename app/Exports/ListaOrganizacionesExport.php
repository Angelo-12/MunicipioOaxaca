<?php

namespace App\Exports;

use App\Models\Organizacion;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;

class ListaOrganizacionesExport implements FromView{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Organizacion::all();
    }

    public function view(): View{

        $organizaciones=Organizacion::all();
        return view('excel.listar_organizaciones',compact('organizaciones'));
    }
}
