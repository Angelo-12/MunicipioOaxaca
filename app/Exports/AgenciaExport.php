<?php

namespace App\Exports;

use App\Models\Agencia;
use App\Models\Colonia;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class AgenciaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Agencia::all();
    }

    public function view(): View{

        $agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        ->select('agencia.*',DB::raw('count(colonia.id_agencia)as total'))
        ->groupBy('agencia.id')
        ->get();

        return view('excel.agencia',compact('agencias'));
    }
}
