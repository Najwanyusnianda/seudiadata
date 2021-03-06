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

////URL::forceRootUrl('https://webapps.bps.go.id/acehbaratdayakab/');
//URL::forceScheme('https');

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

    Route::name('content.')->group(function () {
        Route::get('/content/index/{subject_id}','ArticleController@index')->name('index');
        Route::get('/content/ulasan','ArticleController@ulasanIndex')->name('ulasan');
        Route::get('/content/map/{subject_id}','ArticleController@mapIndex')->name('map');
        Route::get('/content/grafik/{subject_id}','ArticleController@graphIndex')->name('graph');
        Route::get('/content/data','ArticleController@dataIndex')->name('data');
    
        //graph
        Route::get('/content/grafik/indikator/{indikator_id}','ArticleController@graphContent')->name('graph.content');
        Route::get('/content/map/indikator/{indikator_id}','ArticleController@mapContent')->name('map.content');
        
        //map
        //Route::get('/tk/map/jumlahKemiskinan','TenagaKerjaController@mapJumlahKemiskinan')->name('map.jumlah');

       
    });
    
    Route::name('data.')->group(function () {
        //input data
        Route::get('/data_management/input_data/index','DataSourceController@index')->name('index');
        Route::get('/data_management/input_data/index_input/{indikator_id}','DataSourceController@inputIndex')->name('input.index');
        Route::get('/data_management/input_data/index/{subject_id}/indikator','DataSourceController@indicatorIndex')->name('indicatorIndex');
        Route::get('/data_management/input_data/create','DataSourceController@create')->name('create');
        Route::post('/data_management/input_data/store','DataSourceController@store')->name('store');
        Route::post('/data_management/input_data/update','DataSourceController@update')->name('update');
        Route::get('/data_management/input_data/{indikator_id}/delete/','DataSourceController@delete')->name('delete');

        //map --------------------
        Route::get('/data_management/input_data/index/{subject_id}/map_indikator','DataSourceController@mapIndicatorIndex')->name('mapIndicatorIndex');
        Route::get('/data_management/input_data/index_input_map/{indikator_id}','DataSourceController@mapInputIndex')->name('mapInput.index');

        Route::get('/data_management/input_data/create_map','DataSourceController@createMap')->name('createMap');
        Route::post('/data_management/input_data/store_map','DataSourceController@storeMap')->name('storeMap');
        Route::post('/data_management/input_data/update_map','DataSourceController@updateMap')->name('updateMap');
        Route::get('/data_management/input_data/{indikator_id}/delete_map/','DataSourceController@deleteMap')->name('deleteMap');
         //service
         Route::get('/data_management/input_data/{type}','DataSourceController@getDownloadTemplate')->name('downloadTemplate');
         Route::get('/data_management/input_data/{indikator_id}/download','DataSourceController@getDownloadData')->name('downloadData');
         Route::get('/data_management/input_data_map/{indikator_id}/download','DataSourceController@getDownloadDataMap')->name('downloadDataMap');
    });

    Route::name('user.')->group(function () {
      Route::get('/user_management/index', 'UserController@index')->name('index');
      Route::get('/user_management/create', 'UserController@create')->name('create');
      Route::post('/user_management/store', 'UserController@store')->name('store');
      Route::get('/user_management/update/{user_id}', 'UserController@update')->name('update');
      Route::post('/user_management/updateStore/{user_id}', 'UserController@updateStore')->name('storeUpdate');
      Route::get('/user_management/delete/{user_id}', 'UserController@delete')->name('delete');
    });


    
    
    
 });


Auth::routes();


