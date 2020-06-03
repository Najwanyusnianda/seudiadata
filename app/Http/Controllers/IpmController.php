<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IpmController extends Controller
{
    //

    public function index(){
        return view('frontend.ipm.ipm');
    }

    public function ulasanIndex(){

    }
    public function mapIndex(){
        return view('frontend.ipm.map_ipm');
    }
    
    public function graphIndex(){
        return view('frontend.ipm.graph_ipm');
    }
    public function dataIndex(){
        return view('frontend.ipm.data_index');
    }


    //graph

    public function graphIPM(){
        $series_ipm=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.ipm.graph.series_IPM',
        ['tahun'=>$tahun,'series_ipm'=>$series_ipm]);
    }


}
