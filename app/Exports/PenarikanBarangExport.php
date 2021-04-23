<?php

namespace App\Exports;

use App\PenarikanBarang;
use Maatwebsite\Excel\Concerns\FromCollection;

class PenarikanBarangExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return PenarikanBarang::all();
    }
}
