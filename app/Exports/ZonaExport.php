<?php

namespace App\Exports;

use App\Models\Zona;
use Maatwebsite\Excel\Concerns\FromCollection;

class ZonaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Zona::all();
    }
}
