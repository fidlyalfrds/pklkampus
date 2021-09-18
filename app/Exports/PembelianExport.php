<?php

namespace App\Exports;

use App\pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembelianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return pembelian::all();
    }
}
