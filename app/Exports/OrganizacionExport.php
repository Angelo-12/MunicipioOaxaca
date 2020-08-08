<?php

namespace App\Exports;

use App\Models\Organizacion;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrganizacionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Organizacion::all();
    }
}
