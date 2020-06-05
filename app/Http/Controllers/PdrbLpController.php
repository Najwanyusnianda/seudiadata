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
        $data_dist_pdrb=[29.28,1.18,2.7,0.11,0.01,16.18,17.47,5.94,0.93,2.22,2.29,0.32,9.37,2.67,3.29,3.06];
        $label_alias=['a','b','c','d','e','f','g'];
        $label_lapanganUsaha=['Pertanian, Kehutanan, dan Perikanan',
        'Pertambangan dan Penggalian','Industri Pengolahan','Pengadaan Listrik dan Gas','Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang',' Konstruksi','Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor/Wholesale and Retail Trade; Repair of Motor Vehicles and Motorcycles	
        ','Transportasi dan Pergudangan','Penyediaan Akomodasi dan Makan Minum','Informasi dan Komunikasi','Jasa Keuangan dan Asuransi','Real Estate','Jasa Perusahaan','Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib','Jasa Pendidikan','Jasa Kesehatan dan Kegiatan Sosial','Jasa lainnya'];
        return view('frontend.pdrb_lp.graph.bar_distPDRB',
        ['label_lp'=>$label_lapanganUsaha,'data_dist_pdrb'=>$data_dist_pdrb]);
    }
}
