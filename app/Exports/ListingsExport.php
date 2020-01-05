<?php

namespace App\Exports;

use App\Listing;
use Maatwebsite\Excel\Concerns\FromCollection;

class ListingsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Listing::all();
    }
}
