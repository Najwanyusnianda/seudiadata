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
        $series_pdrb_adhb=[2968.35,3174.81,3394.32,3635.49,3854.66];
        $tahun=[2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_pdrb_adhb',
        ['tahun'=>$tahun,'series_pdrb_adhb'=>$series_pdrb_adhb]);
    }

    public function graphSeriesPDRB_ADHK(){
        $series_pdrb_adhk=[2509.31,2623.75,2740.78,2867.17,3003.11];
        $tahun=[2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_pdrb_adhk',
        ['tahun'=>$tahun,'series_pdrb_adhk'=>$series_pdrb_adhk]);
    }

    public function graphPiePDRB(){
        $data_dist_pdrb=[29.28,1.18,2.7,0.11,0.01,16.18,17.47,5.94,0.93,2.22,2.29,2.99,0.32,9.37,2.67,3.29,3.06];
        $label_alias=['a','b','c','d','e','f','g','h','i','j','k',
        'l','m,n','o','p','q','r,s,t,u'];
        $label_lapanganUsaha=['Pertanian, Kehutanan, dan Perikanan',
        'Pertambangan dan Penggalian','Industri Pengolahan','Pengadaan Listrik dan Gas','Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang',' Konstruksi','Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor/Wholesale and Retail Trade; Repair of Motor Vehicles and Motorcycles	
        ','Transportasi dan Pergudangan','Penyediaan Akomodasi dan Makan Minum','Informasi dan Komunikasi','Jasa Keuangan dan Asuransi','Real Estate','Jasa Perusahaan','Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib','Jasa Pendidikan','Jasa Kesehatan dan Kegiatan Sosial','Jasa lainnya'];
        return view('frontend.pdrb_lp.graph.pie_dist_pdrb',
        ['lapangan_usaha'=>$label_lapanganUsaha,'data_dist_pdrb'=>$data_dist_pdrb,'label_alias'=>$label_alias]);
    }
    public function graphPertumbuhanEkonomi(){
        $series_pertumbuhan_ekonomi=[118.29,121.00,123.85,126.80,128.36];
        $tahun=[2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_pertumbuhan_economy',
        ['tahun'=>$tahun,'series_pertumbuhan_ekonomi'=>$series_pertumbuhan_ekonomi]);
    }
    public function graphPertumbuhanImplisit(){
        $series_laju_implisit=[3.32,2.29,2.35,2.38,1.23];
        $tahun=[2015,2016,2017,2018,2019];
        return view('frontend.pdrb_lp.graph.series_pertumbuhan_implisit',
        ['tahun'=>$tahun,'series_laju_implisit'=>$series_laju_implisit]);
    }

    public function graphBarPDRBDistribusi(){
        $data_dist_pdrb=[29.28,1.18,2.7,0.11,0.01,16.18,17.47,5.94,0.93,2.22,2.29,0.32,9.37,2.67,3.29,3.06];
        $label_alias=['a','b','c','d','e','f','g','h','i','j','k',
        'l','m','n','o','p','q','r,s,t,u'];
        $label_lapanganUsaha=['Pertanian, Kehutanan, dan Perikanan',
        'Pertambangan dan Penggalian','Industri Pengolahan','Pengadaan Listrik dan Gas','Pengadaan Air, Pengelolaan Sampah, Limbah dan Daur Ulang',' Konstruksi','Perdagangan Besar dan Eceran; Reparasi Mobil dan Sepeda Motor/Wholesale and Retail Trade; Repair of Motor Vehicles and Motorcycles	
        ','Transportasi dan Pergudangan','Penyediaan Akomodasi dan Makan Minum','Informasi dan Komunikasi','Jasa Keuangan dan Asuransi','Real Estate','Jasa Perusahaan','Administrasi Pemerintahan, Pertahanan dan Jaminan Sosial Wajib','Jasa Pendidikan','Jasa Kesehatan dan Kegiatan Sosial','Jasa lainnya'];
        return view('frontend.pdrb_lp.graph.bar_distPDRB',
        ['label_lp'=>$label_lapanganUsaha,'data_dist_pdrb'=>$data_dist_pdrb,'label_alias'=>$label_alias]);
    }
}
