<?php

namespace App\Exports;

use App\Users;
use App\Models\Administrador_Secretaria;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class UsersExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return User::all();
    }

    public function view(): View{

        $usuarios=Administrador_Secretaria::join('users','admin_secretaria.id_usuario','=','users.id')
        ->where('admin_secretaria.cargo','=','Administrador')
        ->get();
      
        return view('excel.usuarios',compact('usuarios'));
    }
}
