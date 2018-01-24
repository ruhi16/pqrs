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
| Middleware: FinMidware => 1st:combined Table Name, 2nd: Content Table Names, 3rd: so on
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', ['as'=>'xyz', 'uses'=>'HomeController@index']);

Route::get('/clsses', 'ClssesController@clsses')->middleware('FinMidware:clsses');
Route::post('/clsses-submit', 'ClssesController@clssesSubmit');
Route::get('/clsses-view', 'ClssesController@clssesView');
Route::post('/clsses-editsubmit', 'ClssesController@clssesEditSubmit');
Route::post('/clsses-deltsubmit', 'ClssesController@clssesDeltSubmit');



Route::get('/schoolInfo', 'SchoolController@schoolInfo')->name('xyz');
Route::post('/schoolInfo-submit', 'SchoolController@schoolInfoSubmit');
Route::get('/schoolInfoView', 'SchoolController@schoolInfoView');

Route::get('/session', 'SessionController@session');
Route::get('/setSession/{session_id}', 'SessionController@setSession');
Route::post('/addSession', 'SessionController@addSession');
Route::get('/editSession/{session_id}', 'SessionController@editSession');


// Route::get('/clssecs', 'ClsSecController@clssec')->middleware('FinMidware:clssecs-clsses-sections');
// Route::post('/clssec-submit', 'ClsSecController@clssecSubmit');
// Route::get('/clssecs-view', 'ClsSecController@clssecView');//->middleware('FinMidware:clsses-sections');

Route::get('/addSec/{n}', 'ClsSecController@addSec');
Route::get('/delSec/{n}', 'ClsSecController@delSec');


Route::get('/clssec-TaskPage', 'ClsSecController@clssecTaskPage');
Route::get('/clssec-AdminPage/{clss_id}/{section_id}', 'ClsSecController@clssecAdminPage');
Route::get('/issueRoll/{id}', 'ClsSecController@issueRoll');



Route::get('/clssub', 'ClsSubController@clssub');
Route::post('/clssub-submit', 'ClsSubController@clssubSubmit');
Route::get('/clssub-view', 'ClsSubController@clssubView');



Route::get('/clssec-MrkenPage/{clssec_id}', 'MarksEntryController@clssecMrkenPage');
Route::get('/Clssecstd-MarksEntry/{extpcl_id}/{clsb_id}/{clsc_id}', 'MarksEntryController@ClssecstdMarksEntry');
Route::get('/clssec-MarksRegister/{clssec_id}',  'MarksEntryController@clssecMarksRegister');
//Ajax Update
Route::post('/updateMarks', 'MarksEntryController@updateMarks');



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
Route::get('/finalizeSessions', 'FinalizeController@finalizeSessions');

Route::get('/finalizeSchool', 'FinalizeController@finalizeSchool')->name('finalizeSchool');
Route::get('/btn-finalize/{n}','FinalizeController@btnFinalize');