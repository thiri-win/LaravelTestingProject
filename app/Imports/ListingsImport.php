<?php

namespace App\Imports;

use App\Listing;
use Maatwebsite\Excel\Concerns\ToModel;

class ListingsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Listing([
            'product'=>$row[0],
            'product_info'=>$row[1],
            'in_stock'=>$row[2],
            'price'=>$row[3],
            'remark'=>$row[4],
        ]);
    }
}
