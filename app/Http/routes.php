<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth(['only' => ['login','logout']]);

Route::get('/home', ['as' => 'home', 'uses' => 'HomeController@index']);

Route::group(['prefix' => 'pengajuan'],function(){
    Route::get('pengaju','DosenPembimbingController@listPengaju');
    Route::get('dospem/{id}','DosenPembimbingController@showFormAddDospem');
    Route::post('dospem/{id}','DosenPembimbingController@addDospem');
    Route::get('dospem','DosenPembimbingController@showFormPengajuan');
    Route::post('add','DosenPembimbingController@pengajuanDosPem');

    Route::group(['prefix' => 'sempro'], function(){
        Route::get('/create','SemproController@create');
        Route::post('/','SemproController@store');
    });
});

Route::resource('bimbingan','BimbinganController');

Route::get('bimbingan/respon/{bimbinganId}/{nip}','BimbinganController@showRespon');

Route::get('surat','SuratController@index');

Route::resource('respon','ResponseBimbinganController');

Route::get('respon/sudah/{status}','ResponseBimbinganController@index');

Route::group(['prefix' => 'api'],function(){
    Route::get('dosen/{id}','ApiController@dosen');
});
