<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TenagaKerjaController extends Controller
{
    //

    public function index(){
        return view('frontend.tk.tk');
    }

    public function ulasanIndex(){

    }
    public function mapIndex(){
        return view('frontend.tk.map_tk');
    }
    
    public function graphIndex(){
        return view('frontend.tk.graph_tk');
    }
    public function dataIndex(){
        return view('frontend.tk.data_index');
    }


    //graph

    public function graphSeriesTPAK(){
        $series_tpak=[62.26,62.26,62.01,63.72,58.28];
        $tahun=[2015,2016,2017,2018,2019];
        return view('frontend.tk.graph.series_tpak',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }
    public function graphSeriesTPT(){
        $series_tpt=[11.66,11.66,3.16,3.95,4.30];
        $tahun=[2015,2016,2017,2018,2019];
        return view('frontend.tk.graph.series_tpt',
        ['tahun'=>$tahun,'series_tpt'=>$series_tpt]);
    }
}
