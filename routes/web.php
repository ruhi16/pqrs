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
    return view('start');
});

Auth::routes();

Route::get('/home', ['as'=>'xyz', 'uses'=>'HomeController@index']);

Route::get('/clsses', 'ClssesController@clsses')->middleware('FinMidware:clsses');
Route::post('/clsses-submit', 'ClssesController@clssesSubmit');
Route::get('/clsses-view', 'ClssesController@clssesView');
Route::post('/clsses-editsubmit', 'ClssesController@clssesEditSubmit');
Route::post('/clsses-deltsubmit', 'ClssesController@clssesDeltSubmit');

Route::get('/exams', 'ExamController@exams')->middleware('FinMidware:exams');
Route::post('/exams-submit', 'ExamController@examsSubmit');
Route::get('/exams-view', 'ExamController@examsView');
Route::post('/exams-editsubmit', 'ExamController@examsEditSubmit');
Route::post('/exams-deltsubmit', 'ExamController@examsDeltSubmit');


Route::get('/extypes', 'ExtypeController@extypes')->middleware('FinMidware:extypes');
Route::post('/extypes-submit', 'ExtypeController@extypesSubmit');
Route::get('/extypes-view', 'ExtypeController@extypesView');
Route::post('/extypes-editsubmit', 'ExtypeController@extypesEditSubmit');
Route::post('/extypes-deltsubmit', 'ExtypeController@extypesDeltSubmit');


Route::get('/sections', 'SectionController@sections')->middleware('FinMidware:sections');
Route::post('/sections-submit', 'SectionController@sectionsSubmit');
Route::get('/sections-view', 'SectionController@sectionsView');
Route::post('/sections-editsubmit', 'SectionController@sectionsEditSubmit');
Route::post('/sections-deltsubmit', 'SectionController@sectionsDeltSubmit');


Route::get('/subjects', 'SubjectController@subjects')->middleware('FinMidware:subjects');
Route::post('/subjects-submit', 'SubjectController@subjectsSubmit');
Route::get('/subjects-view', 'SubjectController@subjectsView');
Route::post('/subjects-editsubmit', 'SubjectController@subjectsEditSubmit');
Route::post('/subjects-deltsubmit', 'SubjectController@subjectsDeltSubmit');

Route::get('/school', 'SchoolController@school')->middleware('FinMidware:schools');//->name('xyz');
Route::post('/school-submit', 'SchoolController@schoolSubmit');
Route::get('/schoolView', 'SchoolController@schoolView');

Route::get('/gradeparticulars', 'GradeparticularController@gradeparticulars')->middleware('FinMidware:gradeparticulars');
Route::post('/gradeparticulars-submit', 'GradeparticularController@gradeparticularsSubmit');
Route::get('/gradeparticulars-view', 'GradeparticularController@gradeparticularsView');
Route::post('/gradeparticulars-editsubmit', 'GradeparticularController@gradeparticularsEditSubmit');
Route::post('/gradeparticulars-deltsubmit', 'GradeparticularController@gradeparticularsDeltSubmit');

Route::get('/grades', 'GradeController@grades');//->middleware('FinMidware:grades');
Route::post('/grades-submit', 'GradeController@gradesSubmit');
Route::get('/grades-view', 'GradeController@gradesView');
Route::post('/grades-editsubmit', 'GradeController@gradesEditSubmit');
Route::post('/grades-deltsubmit', 'GradeController@gradesDeltSubmit');

// till the above entry was tested Oke with middleware too

Route::get('/gradedescription', 'GradedescrController@gradedescr');//->middleware('FinMidware:gradeparticulars');
Route::post('/gradedescription-submit', 'GradedescrController@gradedescrSubmit');
Route::get('/gradedescription-view', 'GradedescrController@gradedescrView');
Route::post('/gradedescription-editsubmit', 'GradedescrController@gradedescrEditSubmit');
Route::post('/gradedescription-deltsubmit', 'GradedescrController@gradedescrDeltSubmit');




Route::get('/session', 'SessionController@session');
Route::get('/setSession/{session_id}', 'SessionController@setSession');
Route::post('/addSession', 'SessionController@addSession');
Route::get('/editSession/{session_id}', 'SessionController@editSession');


Route::get('/clssecs', 'ClsSecController@clssec')->middleware('FinMidware:clssecs-clsses-sections');
Route::post('/clssec-submit', 'ClsSecController@clssecSubmit');
Route::get('/clssecs-view', 'ClsSecController@clssecView');
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

Route::get('/studentdbmultipage', 'StudentController@studentdbmultipage');
Route::post('/studentdbmultipage-submit', 'StudentController@studentdbmultipageSubmit');
Route::get('/studentdbmultipage-search', 'StudentController@studentdbmultipageSearch');
Route::get('/studentdbmultipage-view', 'StudentController@studentdbmultipageView');
Route::get('/studentdbmultipage-edit/{id}', 'StudentController@studentdbmultipageEdit');
Route::post('/studentdbmultipageEdit-submit', 'StudentController@studentdbmultipageEditSubmit');


Route::get('/test', 'BaseController@test');
Route::get('/clssubjfm/{clss_id}', 'BaseController@clssubjfm');
Route::post('/clssubjfm-submit', 'BaseController@clssubjfmSubmit');
Route::get('/clssubjfm-view/{clss_id}', 'BaseController@clssubjfmView');



Route::get('/finalizeParticulars', 'FinalizeController@finalizeParticulars');
Route::get('/finalizeParticulars-Refresh', 'FinalizeController@finalizeParticularsRefresh')->name('finalizeParticulars-Refresh');
Route::get('/btn-finalize/{n}','FinalizeController@btnFinalize');
Route::get('/btn-unfinalize/{n}','FinalizeController@btnUnFinalize');

Route::get('/finalizeSessions', 'FinalizeController@finalizeSessions');
Route::get('/finalizeSchool', 'FinalizeController@finalizeSchool')->name('finalizeSchool');



Route::get('/teachers', 'TeacherController@teachers')->middleware('FinMidware:subjects');
Route::post('/teachers-submit', 'TeacherController@teachersSubmit');
Route::get('/teachers-view', 'TeacherController@teachersView');
Route::post('/teachers-editsubmit', 'TeacherController@teachersEditSubmit');
Route::post('/teachers-deltsubmit', 'TeacherController@teachersDeltSubmit');
