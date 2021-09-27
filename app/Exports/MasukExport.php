<?php

namespace App\Exports;

use App\barang_masuk;
use Maatwebsite\Excel\Concerns\FromCollection;

class MasukExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return barang_masuk::all();
    }
}
