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





Route::group(['middleware' => ['auth']], function () {
    //
    Route::get('/', 'HomeController@index')->name('home');
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
    
    
 });


Auth::routes();


