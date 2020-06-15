<?php

namespace App\Exports;

use App\DataIndikator;
use Maatwebsite\Excel\Concerns\FromArray;

class DataIndikatorExport implements FromArray
{
    protected $datas;

    public function __construct(array $datas)
    {
        $this->datas = $datas;
    }

    public function array(): array
    {
        return $this->datas;
    }
}
