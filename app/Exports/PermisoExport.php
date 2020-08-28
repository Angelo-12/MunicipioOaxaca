<?php

namespace App\Exports;

use App\Models\Permisos;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\view;
use Maatwebsite\Excel\Facades\Excel;
use DB;

class PermisoExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $nombre;

    public function __construct($nombre)
    {
        $this->nombre = $nombre;
    }

    public function collection()
    {
        return Permiso::all();
    }

    public function view(): View{

        if($this->nombre=="Anuales"){
            $permisos=Permisos::join('anuales','permiso.id','anuales.id_permiso')
            ->paginate(10);
        }else if($this->nombre=="Eventuales"){
            $permisos=Permisos::join('eventuales','permiso.id','eventuales.id_permiso')
            ->paginate(10);
        }else if($this->nombre=="Provisionales"){
            $permisos=Permisos::join('provisionales','permiso.id','provisionales.id_permiso')
            ->paginate(10);
        }else if($this->nombre=="Pendientes"){
            $permisos=Permisos::where('asignado','=','0')
            ->paginate(10);
        }else if($this->nombre=="Cancelados"){
            $permisos=Permisos::join('cancelacion','permiso.id','=','cancelacion.id_permiso')
            ->paginate(10);

        }else if($this->nombre=="Sancionados"){
            $permisos=Permisos::join('sancion','permiso.id','=','sancion.id_permiso')
            ->paginate(10);
        }else if($this->nombre=="Revalidados"){
            $permisos=Permisos::join('revalidacion','permiso.id','=','revalidacion.id_permiso')
            ->paginate(10);
         
        }
      
        return view('excel.permisos',compact('permisos'));
    }
}
