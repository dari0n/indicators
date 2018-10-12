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

Auth::routes();

Route::get('/home','HomeController@index')->middleware('auth','isActive','isSession');
Route::get('/ban','Ban\BanController@index')->middleware('web');
Route::get('/badsession','Ban\BanController@badSession')->middleware('web');

Route::group(['prefix'=>'admin','middleware'=>['web','auth','isAdmin','isActive'] ,'namespace' => 'admin'], function(){
    Route::get('/','AdminController@index')->name('admin');
    Route::resource('user','UserController');
    Route::get('datatable','DataTableController@index')->name('DataTable');
    Route::get('delta','DeltaController@index')->name('DataDelta');


});

Route::group(['prefix'=>'json','middleware'=>['web','auth','isActive'] ,'namespace' => 'json'], function(){
    Route::get('jsonOutput/{osn}/{tf}','JsonController@index')->name('jsonIndex');

});