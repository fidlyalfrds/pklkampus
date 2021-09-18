<?php

namespace App\Exports;

use App\preorder;
use App\barang_keluar;
use App\pembelian;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return preorder::all();
        return barang_keluar::all();
        return pembelian::all();
    }
}
