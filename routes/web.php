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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/clssub', 'BaseController@clssub');
Route::post('/clssub-submit', 'BaseController@clssubSubmit');
Route::get('/clssub-view', 'BaseController@clssubView');


Route::get('exmtypclssub', 'BaseController@exmtypclssub');
Route::post('exmtypclssub-submit', 'BaseController@exmtypclssubSubmit');
Route::get('exmtypclssub-view', 'BaseController@exmtypclssubView');

Route::get('/studentdb', 'StudentController@studentdb');
Route::post('/studentdb-submit', 'StudentController@studentdbSubmit');

Route::get('/clssec', 'BaseController@clssec');
Route::post('/clssec-submit', 'BaseController@clssecSubmit');
Route::get('/clssec-view', 'BaseController@clssecView');




Route::get('/clssec-TaskPage', 'ClsSecController@clssecTaskPage');

Route::get('/test', 'BaseController@test');