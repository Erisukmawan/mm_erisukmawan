<?php

namespace App\Exports;

use App\Pemasok;
use Maatwebsite\Excel\Concerns\FromCollection;

class PemasokExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasok::all();
    }
}
