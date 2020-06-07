<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\DataIndikator;

class DataSourceController extends Controller
{
    //

    public function index(){
        $subject=Subject::all();
        return view('backend.data_management.input_data_indeks',compact('subject'));
    }

    public function indicatorIndex($subject_id){
        $subject=Subject::find($subject_id);
        $indikators=DataIndikator::where('subject_id',$subject_id)->get();
        //dd($indikators);
        return view('backend.data_management.indicator_indeks',compact('indikators','subject'));
    }

    public function inputIndex($indikator_id){
        $indikator=DataIndikator::find($indikator_id);
        return view('backend.data_management.input_data_form',compact('indikator'));
    }

    public function eksportDataIndicator(){

    }

    public function update(Request $request){
        
        $indikator_id=$request->indikator_id;
        if($indikators != null){
            $indikator=DataIndikator::find($indikator_id);

            if ($request->file('data_file')) {
                Excel::import(new DataIndikatorImport(), request()->file('data_file'));

                $indikator->update([
                    'ulasan'=>$request->ulasan,
                ]);
            }else{
                //bila tidak upload file data
            }
        }else{
           // bila tidak ditemukan indikator
        }

        
    }



}
