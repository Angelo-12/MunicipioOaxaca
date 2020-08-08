<?php

namespace App\Exports;

use App\Models\Colonia;
use Maatwebsite\Excel\Concerns\FromCollection;

class ColoniaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Colonia::all();
    }
}
