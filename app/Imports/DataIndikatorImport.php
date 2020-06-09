<?php

namespace App\Imports;

use App\DataIndikator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;


class DataIndikatorImport implements  ToCollection
{

protected $id;

 function __construct($id,$ulasan) {
        $this->id = $id;
        $this->ulasan= $ulasan;
 }

    public function collection(Collection $rows)
    {
        $indikator_id=$this->id;
        $ulasan=$this->ulasan;
        $data=$rows;
        $data=json_encode($data,JSON_FORCE_OBJECT);
        $indikator=DataIndikator::find($indikator_id);
       
        $indikator=DataIndikator::find($indikator_id);
            $indikator->update([
                'data'=>$data,
                'ulasan'=>$ulasan,
            ]);

        return redirect()->back();    
    }
}
