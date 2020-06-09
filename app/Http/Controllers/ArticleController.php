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
        $subject_indikator=DataIndikator::where('id',$subject_id)
        ->leftJoin('subjects','data_indikators.subject_id','=','subjects.id')
        ->select('data_indikators.id AS indikator_id','data_indikators.indikator AS indikator_item','subjects.subject_name AS subject_name','subjects.id AS subject_id')
        ->get();
        return view('frontend.content.content_graph_wrapper',compact('subject_indikator'));
    }

    public function grapContent($indikator_id){
        $dt=DataIndikator::find($idid);
        $ulasan=$dt->ulasan;
        $data=$dt->data;
        $data=json_decode($data,true);
        $tahun=[];
        $df=[];
    }

    
}
