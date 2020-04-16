<?php

namespace App\Imports;

use App\StockInfo;
use Maatwebsite\Excel\Concerns\ToModel;

class StockInfoImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new StockInfo([
            //
        ]);
    }
}
