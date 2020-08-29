<?php

namespace App\Exports;

use App\Users;
use App\Models\Vendedor;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;
class VendedorExport implements FromView {
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Vendedor::all();
    }

    public function view(): View{
        $usuarios=Vendedor::join('users','vendedor.id_usuario','=','users.id')
        ->select('users.*')
        ->paginate(10);
      
        return view('excel.usuarios',compact('usuarios'));
    }
}
