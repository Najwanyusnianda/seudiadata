<?php

namespace App\Imports;

use App\MapIndikator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MapImport implements ToCollection,WithHeadingRow
{
    protected $id;

function __construct($subject_id,$indikator,$id,$ulasan,$title,$subtitle,$isCreate) {
        $this->subject_id = $subject_id;
       $this->id = $id;
       $this->ulasan= $ulasan;
       $this->title=$title;
       $this->subtitle=$subtitle;
       $this->isCreate=$isCreate;
       $this->indikator=$indikator;
}
    public function collection(Collection $rows)
    {
        $data=$rows;

        $data=json_encode($data,JSON_FORCE_OBJECT);

        $ulasan=$this->ulasan;

        if($this->isCreate==1){
            $indikator=MapIndikator::create([
                        'subject_id'=>$this->subject_id,
                        'indikator'=>$this->indikator,
                        'data'=>$data,
                        'ulasan'=>$ulasan,
                        'title'=>$this->title,
                        'subtitle'=>$this->subtitle
                ]);
                return redirect()->route('data.mapIndicatorIndex',[$indikator->subject_id])->with('success','Data Berhasil Ditambahkan');   
        }else{
         $indikator_id=$this->id;   
        $indikator=MapIndikator::find($indikator_id);
            $indikator->update([
                'data'=>$data,
                'ulasan'=>$ulasan,
                'title'=>$this->title,
                'subtitle'=>$this->subtitle
            ]);
        }
    }
}
