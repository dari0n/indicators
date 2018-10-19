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

Route::get('/', 'session@index')->middleware('web');
//Route::get('/','admin\RedisController@index');
Auth::routes();

//Route::get('/home','HomeController@returnView')->middleware('auth','isActive','isSession');
Route::group(['prefix'=>'home','middleware'=>['web','auth','isActive']],function(){
    Route::get('/','HomeController@returnView')->name('home');
    Route::get('jsonOutput','HomeController@index')->name('homeReturnJson');
    Route::get('returnLinks','ReturnLinkController@index')->name('returnLinks');

});

Route::get('/ban','Ban\BanController@index')->middleware('web');
Route::get('/badsession','Ban\BanController@badSession')->middleware('web');

Route::group(['prefix'=>'admin','middleware'=>['web','auth','isAdmin','isActive'] ,'namespace' => 'admin'], function(){

    Route::get('/','AdminController@index')->name('admin');
    Route::resource('user','UserController');
    Route::get('datatable','DataTableController@index')->name('DataTable');
    Route::get('delta','DeltaController@index')->name('DataDelta');

    Route::get('jsonOutput','RedisController@index')->name('jsonIndex');
    Route::get('redisDataTable','RedisController@returnView')->name('returnJson');

    Route::resource('links','LinksController');


});

