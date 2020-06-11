<?php

namespace App\Imports;

use App\DataIndikator;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class DataIndikatorImport implements  ToCollection,WithHeadingRow
{

protected $id;

 function __construct($subject_id,$indikator,$graph_type,$id,$ulasan,$title,$subtitle,$isCreate) {
    $this->subject_id = $subject_id;
        $this->id = $id;
        $this->graph_type = $graph_type;
        $this->ulasan= $ulasan;
        $this->title=$title;
        $this->subtitle=$subtitle;
        $this->isCreate=$isCreate;
       $this->indikator=$indikator;
 }

    public function collection(Collection $rows)
    {

        
        $indikator_id=$this->id;
        $ulasan=$this->ulasan;

        $data=$rows;
        $data=json_encode($data,JSON_FORCE_OBJECT);
       
        if ($this->isCreate==1) {
            
            $indikator=DataIndikator::create([
                        'subject_id'=>$this->subject_id,
                        'indikator'=>$this->indikator,
                        'graph_type'=>$this->graph_type,
                        'data'=>$data,
                        'ulasan'=>$ulasan,
                        'title'=>$this->title,
                        'subtitle'=>$this->subtitle
                ]);
                return redirect()->route('data.indicatorIndex',[$indikator->subject_id])->with('success','Data Berhasil Ditambahkan');
        }else{
            $indikator=DataIndikator::find($indikator_id);
            $indikator->update([
                'indikator'=>$this->indikator,
                'graph_type'=>$this->graph_type,
                'data'=>$data,
                'ulasan'=>$ulasan,
                'title'=>$this->title,
                'subtitle'=>$this->subtitle
            ]);

        return redirect()->route('data.indicatorIndex',[ $indikator->subject_id])->with('success','Data Berhasil Di Update'); 
        }
  
    }
}
