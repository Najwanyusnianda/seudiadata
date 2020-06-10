<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\DataIndikator;
use App\MapIndikator;
use App\Imports\DataIndikatorImport;
use Excel;
use Response;

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

      
        if($indikator_id != null){

            $indikator=DataIndikator::find($indikator_id);
         
            if ($request->file('data_file')) {

                $rows=Excel::import(new DataIndikatorImport($indikator_id,$request->ulasan,$request->title,$request->subtitle), request()->file('data_file'));
          
               // $indikator->update([
              //      'ulasan'=>$request->ulasan,
               // ]);
            
               return redirect()->route('data.indicatorIndex',[ $indikator->subject_id])->with('success','Data Berhasil Di Update');   
            }else{
                //bila tidak upload file data
            }
        }else{
           // bila tidak ditemukan indikator
        }

        
    }

    public function getDownloadTemplate($type){
     
        if($type=='Garis'){
            $file = asset('data/template_content/template_graph_garis.xlsx'); 
        }elseif ($type=='Batang') {
            # code...
            $file = asset('data/template_content/template_graph_batang.xlsx'); 
        }elseif ($type=='pie_chart') {
            # code...
            $file = asset('data/template_content/template_graph_pie.xlsx'); 
        }elseif ($type=='map') {
            # code...
            $file = asset('data/template_content/template_graph_map.xlsx'); 
        }
        else{
            $file = asset('data/template_content/template_graph_garis.xlsx'); 
        }
   
        //$headers = array('Content-Type: application/pdf',);
        return Response::json( $file);
    }




    ////map

    public function mapIndicatorIndex($subject_id){
        $subject=Subject::find($subject_id);
        $indikators=MapIndikator::where('subject_id',$subject_id)->get();
        //dd($indikators);
        return view('backend.data_management.map_indicator_indeks',compact('indikators','subject'));
    }

    public function mapInputIndex($indikator_id){
        
    }


    public function createMap(){
        return view('backend.data_management.input_map_form');
    }






}
