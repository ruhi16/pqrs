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

Route::get('/home', ['as'=>'xyz', 'uses'=>'HomeController@index'])->middleware('FinMidware:abc-hgn');

Route::get('/schoolInfo', 'SchoolController@schoolInfo')->name('xyz');
Route::post('/schoolInfo-submit', 'SchoolController@schoolInfoSubmit');
Route::get('/schoolInfoView', 'SchoolController@schoolInfoView')->middleware('FinMidware:school');

Route::get('/session', 'SessionController@session')->middleware('FinMidware:session');
Route::get('/setSession/{session_id}', 'SessionController@setSession');
Route::post('/addSession', 'SessionController@addSession');
Route::get('/editSession/{session_id}', 'SessionController@editSession');


Route::get('/clssec', 'ClsSecController@clssec');
Route::post('/clssec-submit', 'ClsSecController@clssecSubmit');
Route::get('/clssec-view', 'ClsSecController@clssecView')->middleware('FinMidware:clssec-view');
Route::get('/addSec/{n}', 'ClsSecController@addSec');
Route::get('/delSec/{n}', 'ClsSecController@delSec');

Route::get('/clssec-TaskPage', 'ClsSecController@clssecTaskPage');
Route::get('/clssec-AdminPage/{clss_id}/{section_id}', 'ClsSecController@clssecAdminPage');
Route::get('/issueRoll/{id}', 'ClsSecController@issueRoll');



Route::get('/clssec-MrkenPage/{clssec_id}', 'MarksEntryController@clssecMrkenPage');
Route::get('/Clssecstd-MarksEntry/{extpcl_id}/{clsb_id}/{clsc_id}', 'MarksEntryController@ClssecstdMarksEntry');
Route::get('/clssec-MarksRegister/{clssec_id}',  'MarksEntryController@clssecMarksRegister');
//Ajax Update
Route::post('/updateMarks', 'MarksEntryController@updateMarks');



Route::get('/clssub', 'ClsSubController@clssub');
Route::post('/clssub-submit', 'ClsSubController@clssubSubmit');
Route::get('/clssub-view', 'ClsSubController@clssubView')->middleware('FinMidware:school');

Route::get('exmtypclssub', 'BaseController@exmtypclssub');
Route::post('exmtypclssub-submit', 'BaseController@exmtypclssubSubmit');
Route::get('exmtypclssub-view', 'BaseController@exmtypclssubView');


Route::get('/studentdb', 'StudentController@studentdb');
Route::post('/studentdb-submit', 'StudentController@studentdbSubmit');

//Ajax Update
Route::post('/updateSection', 'StudentController@updateSection');



Route::get('/test', 'BaseController@test');



Route::get('/finalizeParticulars', 'FinalizeController@finalizeParticulars');
Route::get('/finalizeParticulars-Refresh', 'FinalizeController@finalizeParticularsRefresh')->name('finalizeParticulars-Refresh');

Route::get('/finalizeSchool', 'FinalizeController@finalizeSchool')->name('finalizeSchool');