<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\DataIndikator;

class ArticleController extends Controller
{
    //
    public function index($subject_id){
        $subject_id=$subject_id;
        //dd($garis_kemiskinan);
        
        return view('frontend.content.content',compact('subject_id'));
        
    }

    public function graphIndex($subject_id){
        $subject_indikator=DataIndikator::where('data_indikators.subject_id',$subject_id)
        ->rightJoin('subjects','data_indikators.subject_id','=','subjects.id')
        ->select('data_indikators.id AS indikator_id','data_indikators.indikator AS indikator_item','subjects.subject_name AS subject_name','subjects.id AS subject_id')
        ->get();
        //dd($subject_indikator);
        return view('frontend.content.content_graph_wrapper',compact('subject_indikator'));
    }

    public function graphContent($indikator_id){
   
        $dt=DataIndikator::find($indikator_id);
        if($dt->data != null){
            if($dt->graph_type=="Garis"){
                $ulasan=$dt->ulasan;
                $data=$dt->data;
                $data=json_decode($data,true);
                $tahun=[];
                $df=[];
        
                foreach($data as $d){
                    $tahun[]=$d[0];
                    $df[]=$d[1];
                  }
    
                  return view('frontend.content.graph.graph_vis',
                  ['tahun'=>$tahun,'data'=>$df,'content_dt'=>$dt]);
    
            }elseif($dt->graph_type=="Batang"){
                $ulasan=$dt->ulasan;
                $data=$dt->data;
                $data=json_decode($data,true);
                $item=[];
                $df=[];
             $alias=[];
                foreach($data as $d){
                    $item[]=$d[0];
                    $df[]=$d[1];
                  }
    
                  return view('frontend.content.graph.graph_vis',
                  ['item'=>$item,'data'=>$df,'content_dt'=>$dt,'alias'=>$alias]);
    
            }elseif($dt->graph_type=="pie_chart"){
                $ulasan=$dt->ulasan;
                $data=$dt->data;
                $data=json_decode($data,true);
                $item=[];
                $df=[];
                $alias=[];
                foreach($data as $d){
                    $item[]=$d[0];
                    $df[]=$d[1];
                  }
    
                  return view('frontend.content.graph.graph_vis',
                  ['item'=>$item,'data'=>$df,'content_dt'=>$dt,'alias'=>$alias]);
    
    
            }   
        }else{
            return view('frontend.content.graph.graph_vis',['content_dt'=>$dt]);
        }


    
    }

    
}
