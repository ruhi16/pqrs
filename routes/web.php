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

Route::get('/home', ['as'=>'xyz', 'uses'=>'HomeController@index']);

Route::get('/schoolInfo', 'SchoolController@schoolInfo')->name('xyz');
Route::post('/schoolInfo-submit', 'SchoolController@schoolInfoSubmit');
Route::get('/schoolInfoView', 'SchoolController@schoolInfoView');

Route::get('/session', 'BaseController@session');
Route::get('/setSession/{session_id}', 'BaseController@setSession');
Route::post('/addSession', 'BaseController@addSession');
Route::get('/editSession/{session_id}', 'BaseController@editSession');


Route::get('/clssec', 'BaseController@clssec');
Route::post('/clssec-submit', 'BaseController@clssecSubmit');
Route::get('/clssec-view', 'BaseController@clssecView');
Route::get('/addSec/{n}', 'BaseController@addSec');
Route::get('/delSec/{n}', 'BaseController@delSec');



Route::get('/clssub', 'BaseController@clssub');
Route::post('/clssub-submit', 'BaseController@clssubSubmit');
Route::get('/clssub-view', 'BaseController@clssubView');


Route::get('exmtypclssub', 'BaseController@exmtypclssub');
Route::post('exmtypclssub-submit', 'BaseController@exmtypclssubSubmit');
Route::get('exmtypclssub-view', 'BaseController@exmtypclssubView');


Route::get('/studentdb', 'StudentController@studentdb');
Route::post('/studentdb-submit', 'StudentController@studentdbSubmit');

//Ajax Update
Route::post('/updateSection', 'StudentController@updateSection');



Route::get('/clssec', 'BaseController@clssec');
Route::post('/clssec-submit', 'BaseController@clssecSubmit');
Route::get('/clssec-view', 'BaseController@clssecView');




Route::get('/clssec-TaskPage', 'ClsSecController@clssecTaskPage');
Route::get('/clssec-AdminPage/{clss_id}/{section_id}', 'ClsSecController@clssecAdminPage');
Route::get('/issueRoll/{id}', 'ClsSecController@issueRoll');


Route::get('/clssec-MrkenPage/{clssec_id}', 'ClsSecController@clssecMrkenPage');
Route::get('/Clssecstd-MarksEntry/{extpcl_id}/{clsb_id}/{clsc_id}', 'ClsSecController@ClssecstdMarksEntry');
Route::get('/clssec-MarksRegister/{clssec_id}',  'ClsSecController@clssecMarksRegister');

//Ajax Update
Route::post('/updateMarks', 'ClsSecController@updateMarks');

Route::get('/test', 'BaseController@test');



Route::get('/finalizeSchool', 'FinalizeController@finalizeSchool')->name('finalizeSchool');