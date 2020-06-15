<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\DataIndikator;
use App\MapIndikator;
use App\Imports\DataIndikatorImport;
use App\Imports\MapImport;
use App\Exports\MapIndikatorExport;
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

    public function create(){
        $subjects=Subject::all();
        return view('backend.data_management.input_data_form',compact('subjects'));
    }

    public function store(Request $request){
     
        if ($request->file('data_file')) {

        $rows=Excel::import(new DataIndikatorImport($request->subject,$request->indikator,$request->graph_type,0,$request->ulasan,$request->title,$request->subtitle,1), request()->file('data_file'));

// $indikator->update([
//      'ulasan'=>$request->ulasan,
// ]);

        return redirect()->route('data.indicatorIndex',[$request->subject])->with('success','Data Berhasil Ditambahkan');   
        }
    }

    public function update(Request $request){
    
        
        $indikator_id=$request->indikator_id;

      
        if($indikator_id != null){

            $indikator=DataIndikator::find($indikator_id);
         
            if ($request->file('data_file')) {

                $rows=Excel::import(new DataIndikatorImport(0,$request->indikator,$request->graph_type,$indikator_id,$request->ulasan,$request->title,$request->subtitle,2), request()->file('data_file'));
          
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

    public function delete($indikator_id){
        $dt_ind=DataIndikator::find($indikator_id);
        $dt_ind->delete();
        return redirect()->route('data.indicatorIndex',[$dt_ind->subject_id]);
    }

    public function deleteMap($indikator_id){
        $dt_ind=DataIndikator::find($indikator_id);
        $dt_ind->delete();
        return redirect()->back();
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

    public function getDownloadData($indikator_id){
        $indikator=DataIndikator::find($indikator_id);
        $data=json_decode($indikator->data);

        $export = new DataIndikatorExport([$data]);

    return Excel::download($export, $indikator->indikator.'.xlsx');
    }

    
    public function getDownloadDataMap($indikator_id){
        $indikator=MapIndikator::find($indikator_id);
        $data=json_decode($indikator->data);

        $export = new MapIndikatorExport([$data]);

    return Excel::download($export, $indikator->indikator.'.xlsx');
    }


    ////map

    public function mapIndicatorIndex($subject_id){
        $subject=Subject::find($subject_id);
        $indikators=MapIndikator::where('subject_id',$subject_id)->get();
        //dd($indikators);
        return view('backend.data_management.map_indicator_indeks',compact('indikators','subject'));
    }

    public function mapInputIndex($indikator_id){
        $indikator=MapIndikator::find($indikator_id);
        $subject=Subject::find($indikator->subject_id);
        return view('backend.data_management.input_map_form',compact('indikator','subject'));
    }


    public function createMap(){
        $subjects=Subject::all();
        return view('backend.data_management.input_map_form',compact('subjects'));
    }


    public function storeMap(Request $request){
        
   // $indikator=DataIndikator::find($indikator_id);
 
            if ($request->file('data_file')) {

                $rows=Excel::import(new MapImport($request->subject,$request->indikator,0,$request->ulasan,$request->title,$request->subtitle,1), request()->file('data_file'));
  
       // $indikator->update([
      //      'ulasan'=>$request->ulasan,
       // ]);
    
                return redirect()->route('data.mapIndicatorIndex',[$request->subject])->with('success','Data Berhasil Ditambahkan');   
            }
            else {
                //bila tidak upload file data
            }


    }

    public function updateMap(Request $request){
        $indikator_id=$request->indikator_id;

      
        if($indikator_id != null){

            $indikator=MapIndikator::find($indikator_id);
         
            if ($request->file('data_file')) {

                $rows=Excel::import(new MapImport(0,$request->indikator,$indikator_id,$request->ulasan,$request->title,$request->subtitle,2), request()->file('data_file'));
          
               // $indikator->update([
              //      'ulasan'=>$request->ulasan,
               // ]);
            
               return redirect()->route('data.mapIndicatorIndex',[ $indikator->subject_id])->with('success','Data Berhasil Diupdate');   
            }else{
                //bila tidak upload file data
            
                $indikator->update([
                'ulasan'=>$request->ulasan,
                'title'=>$request->title,
                'subtitle'=>$request->subtitle,
                'indikator'=>$request->indikator
                
            ]);
            return redirect()->route('data.mapIndicatorIndex',[ $indikator->subject_id])->with('success','Data Berhasil Diupdate');   
        }
        }else{
           // bila tidak ditemukan indikator
        }
    }






}
