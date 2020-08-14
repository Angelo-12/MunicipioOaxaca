<?php

namespace App\Exports;

use App\Models\Agencia;
use App\Models\Colonia;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class AgenciaColoniaExport implements FromView
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
        return Agencia::all();
    }

    public function view(): View{

        $agencias=Agencia::join('colonia','agencia.id','=','colonia.id_agencia')
        ->join('permiso','permiso.id_colonia','=','colonia.id')
        ->select('colonia.*',DB::raw('count(permiso.id_colonia)as total'))
        ->groupBy('colonia.id')
        ->where('agencia.id','=',$this->id)
        ->get();

        return view('excel.agencia_colonias',compact('agencias'));
    }
}
