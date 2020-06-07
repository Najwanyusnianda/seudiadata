<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/home', function () {
        return redirect()->route('home');
    });
    Route::name('kemiskinan.')->group(function () {
        Route::get('/kemiskinan/index','KemiskinanDashboardController@index')->name('index');
        Route::get('/kemiskinan/ulasan','KemiskinanDashboardController@ulasanIndex')->name('ulasan');
        Route::get('/kemiskinan/map','KemiskinanDashboardController@mapIndex')->name('map');
        Route::get('/kemiskinan/grafik','KemiskinanDashboardController@graphIndex')->name('graph');
        Route::get('/kemiskinan/data','KemiskinanDashboardController@dataIndex')->name('data');
    
        //graph
        Route::get('/kemiskinan/grafik/garisKemiskinan','KemiskinanDashboardController@graphGarisKemiskinan')->name('graph.gk');
        Route::get('/kemiskinan/grafik/giniRatio','KemiskinanDashboardController@graphGiniRatioKemiskinan')->name('graph.gini');
   
        //map
        Route::get('/kemiskinan/map/jumlahKemiskinan','KemiskinanDashboardController@mapJumlahKemiskinan')->name('map.jumlah');
    });
    Route::name('ipm.')->group(function () {
        Route::get('/ipm/index','IpmController@index')->name('index');
        Route::get('/ipm/ulasan','IpmController@ulasanIndex')->name('ulasan');
        Route::get('/ipm/map','IpmController@mapIndex')->name('map');
        Route::get('/ipm/grafik','IpmController@graphIndex')->name('graph');
        Route::get('/ipm/data','IpmController@dataIndex')->name('data');

    
        //graph
        Route::get('/tk/grafik/SeriesIPM','IpmController@graphIPM')->name('graph.series.IPM');

        //map
 });


    Route::name('tk.')->group(function () {
        Route::get('/tk/index','TenagaKerjaController@index')->name('index');
        Route::get('/tk/ulasan','TenagaKerjaController@ulasanIndex')->name('ulasan');
        Route::get('/tk/map','TenagaKerjaController@mapIndex')->name('map');
        Route::get('/tk/grafik','TenagaKerjaController@graphIndex')->name('graph');
        Route::get('/tk/data','TenagaKerjaController@dataIndex')->name('data');
    
        //graph
        Route::get('/tk/grafik/SeriesTPAK','TenagaKerjaController@graphSeriesTPAK')->name('graph.series.tpak');
        Route::get('/tk/grafik/SeriesTPT','TenagaKerjaController@graphSeriesTPT')->name('graph.series.tpt');
   
        //map
        //Route::get('/tk/map/jumlahKemiskinan','TenagaKerjaController@mapJumlahKemiskinan')->name('map.jumlah');
    });

    Route::name('pdrb_lp.')->group(function () {
        Route::get('/pdrb_lp/index','PdrbLpController@index')->name('index');
        Route::get('/pdrb_lp/ulasan','PdrbLpController@ulasanIndex')->name('ulasan');
        Route::get('/pdrb_lp/map','PdrbLpController@mapIndex')->name('map');
        Route::get('/pdrb_lp/grafik','PdrbLpController@graphIndex')->name('graph');
        Route::get('/pdrb_lp/data','PdrbLpController@dataIndex')->name('data');
    
        //graph
        Route::get('/pdrb_lp/grafik/pdrb_lp_adhb_series','PdrbLpController@graphSeriesPDRB_ADHB')->name('graph.series.pdrb_adhb');
        Route::get('/pdrb_lp/grafik/pdrb_lp_adhk_series','PdrbLpController@graphSeriesPDRB_ADHK')->name('graph.series.pdrb_adhk');
        Route::get('/pdrb_lp/grafik/pdrb_lp_pie','PdrbLpController@graphPiePDRB')->name('graph.pie.pdrb');
        Route::get('/pdrb_lp/grafik/pdrb_lp_bar_distribution','PdrbLpController@graphBarPDRBDistribusi')->name('graph.bar.pdrb_distribusi');
        Route::get('/pdrb_lp/grafik/pdrb_lp_pertumbuhan_ekonomi','PdrbLpController@graphPertumbuhanEkonomi')->name('graph.series.pertumbuhan_ekonomi');
        Route::get('/pdrb_lp/grafik/pdrb_lp_pertumbuhan_implisit','PdrbLpController@graphPertumbuhanImplisit')->name('graph.series.implisit');
   
        //map
        //Route::get('/tk/map/jumlahKemiskinan','TenagaKerjaController@mapJumlahKemiskinan')->name('map.jumlah');
    });


    
    Route::name('data.')->group(function () {
        //input data
        Route::get('/data_management/input_data/index','DataSourceController@index')->name('index');
        Route::get('/data_management/input_data/index_input/{indikator_id}','DataSourceController@inputIndex')->name('input.index');
        Route::get('/data_management/input_data/index/{subject_id}/indikator','DataSourceController@indicatorIndex')->name('indicatorIndex');
        Route::get('/data_management/input_data/create','DataSourceController@create');
        Route::post('/data_management/input_data/store','DataSourceController@store');
        Route::post('/data_management/input_data/update','DataSourceController@update');
        Route::post('/data_management/input_data/delete','DataSourceController@delete');
    });


    
    
    
 });


Auth::routes();


