<?php

namespace App\Exports;

use App\barang_keluar;
use Maatwebsite\Excel\Concerns\FromCollection;

class KeluarExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return barang_keluar::all();
    }
}
