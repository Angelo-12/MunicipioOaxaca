<?php

namespace App\Exports;

use App\Models\Actividad_Comercial;
use Maatwebsite\Excel\Concerns\FromCollection;

class ActividadExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Actividad_Comercial::all();
    }
}
