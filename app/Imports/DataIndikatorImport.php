<?php

namespace App\Imports;

use App\DataIndikator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DataIndikatorImport implements  ToCollection,WithHeadingRow
{

protected $id;

 function __construct($id,$ulasan,$title,$subtitle) {
        $this->id = $id;
        $this->ulasan= $ulasan;
        $this->title=$title;
        $this->subtitle=$subtitle;
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
                'title'=>$this->title,
                'subtitle'=>$this->subtitle
            ]);

        return redirect()->route('data.indicatorIndex',[ $indikator->subject_id])->with('success','Data Berhasil Di Update');   
    }
}
