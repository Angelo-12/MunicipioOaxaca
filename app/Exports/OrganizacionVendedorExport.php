<?php

namespace App\Exports;

use App\Models\Organizacion;
use App\Models\Vendedor;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class OrganizacionVendedorExport implements FromView
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
        return Organizacion::all();
    }

    public function view(): View{

        $vendedores=Vendedor::join('users','users.id','=','vendedor.id_usuario')
        ->where('vendedor.id_organizacion','=',$this->id)
        ->get();

        return view('excel.organizaciones_vendedor',compact('vendedores'));
    }

}
