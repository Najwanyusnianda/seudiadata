<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdrbLpController extends Controller
{
    //
    public function index(){
        return view('frontend.pdrb_lp.pdrb_lp');
    }

    public function ulasanIndex(){

    }
    public function mapIndex(){
        return view('frontend.pdrb_lp.map_pdrb_lp');
    }
    
    public function graphIndex(){
        return view('frontend.pdrb_lp.graph_pdrb_lp');
    }
    public function dataIndex(){
        return view('frontend.pdrb_lp.data_index');
    }



    //graph

    public function graphSeriesPDRB_ADHB(){
        $series_tpak=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_tpak',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }

    public function graphSeriesPDRB_ADHK(){
        $series_tpak=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_tpak',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }

    public function graphPiePDRB(){
        $series_tpak=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_tpak',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }
    public function graphPertumbuhanEkonomi(){
        $series_tpak=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_tpak',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }
    public function graphPertumbuhanImplisit(){
        $series_tpak=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_tpak',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }

    public function graphBarPDRBDistribusi(){
        $series_tpak=[58.90,64.25,54.25,58.14,55.30,62.26,62.26,62.01,63.72,58.28];
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.bar_distPDRB',
        ['tahun'=>$tahun,'series_tpak'=>$series_tpak]);
    }
}
