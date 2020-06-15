<?php

namespace App\Exports;

use App\MapIndikator;
use Maatwebsite\Excel\Concerns\FromArray;

class MapIndikatorExport implements FromArray
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
