<?php

namespace App\Exports;

use App\reseller;
use Maatwebsite\Excel\Concerns\FromCollection;

class ResellerExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return reseller::all();
    }
}
