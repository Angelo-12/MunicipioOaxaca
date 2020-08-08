<?php

namespace App\Exports;

use App\Models\Permiso;
use Maatwebsite\Excel\Concerns\FromCollection;

class PermisoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Permiso::all();
    }
}
