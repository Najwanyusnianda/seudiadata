<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KemiskinanDashboardController extends Controller
{
    //

    public function index(){
        $tahun=[2010,2011,2012,2013,2014,2015,2016,2017,2018,2019];
        $garis_kemiskinan=[252.217,274.089, 297.858, 283.117 ,288.713 ,292.323 ,306.930 ,329.543 ,340.903,358.059];

        $garis_kemiskinan=json_encode($garis_kemiskinan);
        //dd($garis_kemiskinan);
        return view('frontend.kemiskinan.kemiskinan',['garis_kemiskinan'=>$garis_kemiskinan,
        'tahun'=>$tahun]);
    }
}
