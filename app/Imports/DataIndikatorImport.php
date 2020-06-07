<?php

namespace App\Imports;

use App\DataIndikator;
use Maatwebsite\Excel\Concerns\ToModel;

class DataIndikatorImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new DataIndikator([
            //
            'data' => json_encode($row),
        ]);
    }
}
