<?php
//use Fpdf;
//use App\Extclssubfmpm;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
| Middleware: FinMidware=> 1st:combined Table Name, 2nd: Content Table Names, 3rd: so on
| Middleware: admin     => check the user is admin or not?
| Middleware: user      => check the user is user of not?
| Middleware: matchUser => if not admin, auth teacher_id with logged User_id
*/
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/loginCredencial', 'Auth\LoginController@loginCredencial');            
Route::get('/start', 'StartController@start');

Route::get('/start2', 'StartController@start2');






Route::group(['middleware' => ['auth']], function () {
        Route::get('/home', 'HomeController@index')->name('home');
        
        Route::group(['middleware' => ['admin']], function(){
            Route::get('/admin', 'HomeController@admin');

        });
        
        Route::group(['middleware' => ['user']], function(){
            Route::get('/user', 'HomeController@user');

        });

        
        Route::get('/schools', 'SchoolController@school')->middleware('FinMidware:schools');//->name('xyz');
        Route::post('/schools-submit', 'SchoolController@schoolSubmit');
        Route::get('/schools-view', 'SchoolController@schoolView');


        Route::get('/session', 'SessionController@session')->middleware('FinMidware:sessions');
        Route::get('/setSession/{session_id}', 'SessionController@setSession');
        Route::post('/addSession', 'SessionController@addSession');
        Route::get('/editSession/{session_id}', 'SessionController@editSession');
        Route::get('/sessions-view', 'SessionController@sessionsView');
        


        Route::get('/clsses', 'ClssesController@clsses')->middleware('FinMidware:clsses');
        Route::post('/clsses-submit', 'ClssesController@clssesSubmit');
        Route::get('/clsses-view', 'ClssesController@clssesView');
        Route::post('/clsses-editsubmit', 'ClssesController@clssesEditSubmit');
        Route::post('/clsses-deltsubmit', 'ClssesController@clssesDeltSubmit');
    


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



        
        Route::get('/gradeparticulars', 'GradeparticularController@gradeparticulars')->middleware('FinMidware:gradeparticulars');
        Route::post('/gradeparticulars-submit', 'GradeparticularController@gradeparticularsSubmit');
        Route::get('/gradeparticulars-view', 'GradeparticularController@gradeparticularsView');
        Route::post('/gradeparticulars-editsubmit', 'GradeparticularController@gradeparticularsEditSubmit');
        Route::post('/gradeparticulars-deltsubmit', 'GradeparticularController@gradeparticularsDeltSubmit');



        Route::get('/grades', 'GradeController@grades')->middleware('FinMidware:grades');
        Route::post('/grades-submit', 'GradeController@gradesSubmit');
        Route::get('/grades-view', 'GradeController@gradesView');
        Route::post('/grades-editsubmit', 'GradeController@gradesEditSubmit');
        Route::post('/grades-deltsubmit', 'GradeController@gradesDeltSubmit');


        
        Route::get('/gradedescriptions/{extype_id}', 'GradedescrController@gradedescr');//->middleware('FinMidware:gradeparticulars');
        Route::post('/gradedescriptions-submit', 'GradedescrController@gradedescriptionSubmit');
        Route::get('/gradedescriptions-view/{extype_id}', 'GradedescrController@gradedescrView');

        // Route::post('/gradedescription-submit', 'GradedescrController@gradedescrSubmit');
        // Route::get('/gradedescription-view', 'GradedescrController@gradedescrView');
        // Route::post('/gradedescription-editsubmit', 'GradedescrController@gradedescrEditSubmit');
        // Route::post('/gradedescription-deltsubmit', 'GradedescrController@gradedescrDeltSubmit');




        Route::get('/teachers', 'TeacherController@teachers');//->middleware('FinMidware:subjects');
        Route::post('/teachers-submit', 'TeacherController@teachersSubmit');
        Route::get('/teachers-view', 'TeacherController@teachersView');
        Route::get('/teachers-edit/{id}/{extype_id}', 'TeacherController@teachersEdit');
        Route::post('/teachers-editsubmit', 'TeacherController@teachersEditSubmit');
        // Route::post('/teachers-deltsubmit', 'TeacherController@teachersDeltSubmit');
        Route::get('/teachers-takspan/{teacher_id}', 'TeacherController@teachersTakspan')->middleware('matchUser');
        Route::get('/teachers-CStakspan/{teacher_id}', 'TeacherController@teachersCSTakspan')->middleware('matchUser');
        //for Teacher's Image Upload
        Route::post('/teachers-image/{teacher_id}', 'TeacherController@teachersImage')->name('teachers.image');



        // temporaryly closed
        // Route::get('/clssubjfm/{clss_id}', 'SubjectFMController@clssubjfm');
        // Route::post('/clssubjfm-submit', 'SubjectFMController@clssubjfmSubmit');
        // Route::get('/clssubjfm-view/{clss_id}', 'SubjectFMController@clssubjfmView');

        //all class mode selected data simultaniously
        //Route::get('/exmtypmodcls-Taskpane', 'ModeController@Taskpane');
        //Route::post('/exmtypmodcls-taskpaneSubmit','ModeController@taskpaneSubmit');

        //for each class class individually
        Route::get('/exmtypmodcls-Assign/{clss_id}', 'ModeController@exmtypmodclsAssign');
        Route::post('/exmtypmodcls-AssignSubmit', 'ModeController@exmtypmodclsAssignSubmit');




        // till the above entry was tested Oke with middleware too




        Route::get('/clssubs', 'ClsSubController@clssub')->middleware('FinMidware:clssubs-clsses-subjects');
        Route::post('/clssub-submit', 'ClsSubController@clssubSubmit');
        Route::get('/clssubs-view', 'ClsSubController@clssubView');
        
        
        //Ajax
        Route::post('/clssubsView-combineSubject', 'ClsSubController@viewModalSubmitAjax');
        Route::post('/clssubsView-ModalSubmit', 'ClsSubController@viewModalSubmit');

        
        //Ajax
        Route::post('/clssubsView-additionalSubject', 'ClsSubController@viewModalSubmitAjaxAddl');
        Route::post('/clssubsView-ModalSubmitAddl', 'ClsSubController@viewModalSubmitAddl');

        Route::get('/clssubsView-ModalSubmitRefresh/{clss_id}', 'ClsSubController@clssubViewRefresh');

        
        Route::get('/clssecs', 'ClsSecController@clssec')->middleware('FinMidware:clssecs-clsses-sections');
        Route::post('/clssec-submit', 'ClsSecController@clssecSubmit');
        Route::get('/clssecs-view', 'ClsSecController@clssecView');
        Route::get('/addSec/{n}', 'ClsSecController@addSec');
        Route::get('/delSec/{n}', 'ClsSecController@delSec');

        Route::get('/clssecsreport-stdList/{clss_id}/{section_id}', 'ClsSecController@reportStdList');
        Route::get('/clssecsreport-stdListPdf/{clss_id}/{section_id}', 'ClsSecController@reportsStdListPdf');
        Route::get('/clssecsreport-stdListSummativePdf/{clss_id}/{section_id}', 'ClsSecController@reportsStdListSummativePdf');
        Route::get('/clssecsreport-stdListFromativePdf/{clss_id}/{section_id}', 'ClsSecController@reportsStdListFormativePdf');


        


        Route::get('/clssec-TaskPage', 'ClsSecController@clssecTaskPage');
        Route::post('/clssecTaskPage-teacherSubmit', 'ClsSecController@clssecTaskPageTeacherSubmit');


        Route::get('/clssec-AdminPage/{clss_id}/{section_id}', 'ClsSecController@clssecAdminPage');
        Route::get('/issueRoll/{id}', 'ClsSecController@issueRoll');


        Route::get('/clssec-CompactMarkRegister/{clssec_id}', 'compactMarkRegisterController@clssecCompactMarkRegister');
        Route::get('/clssec-CompactMarkRegisterPDF/{clssec_id}/{is_pdf}', 'compactMarkRegisterController@clssecCompactMarkRegisterPDF');



        Route::get('/clssec-MrkenPage/{clssec_id}', 'MarksEntryController@clssecMrkenPage');
        Route::get('/clssecstd-MarksEntry/{extpcl_id}/{clsb_id}/{clsc_id}', 'MarksEntryController@clssecstdMarksEntry');
        
        Route::get('/clssec-MarksRegister/{clssec_id}',  'MarksEntryController@clssecMarksRegister');
        Route::get('/clssec-MarksRegisterv2/{clssec_id}',  'MarksEntryController@clssecMarksRegisterv2');
        Route::get('/clssec-MarksRegisterv3/{clssec_id}',  'MarksEntryController@clssecMarksRegisterv3');


        Route::get('/clssec-ResultSheetv3/{clssec_id}/{studentcr_id}',  'ResultcrController@clssecResultSheetv3');
        Route::get('/clssec-ResultSheetv3PDF/{clssec_id}/{studentcr_id}',  'ResultcrController@clssecResultSheetv3PDF');
        Route::get('/clssec-ResultSheetv4PDF/{clssec_id}/{studentcr_id}',  'ResultcrController@clssecResultSheetv4PDF');

        
        //Route::get ('/clssecStdcr-MarkRefresh/{studentcr_id}', 'StdcrmarkregisterController@clssecStdcrMarkRefreshget');
        Route::post('/clssecStdcr-MarkRefresh/{studentcr_id}/{clss_id}/{section_id}', 'StdcrmarkregisterController@clssecStdcrMarkRefreshpost');
        //Ajax Update
        Route::post('/updateMarks', 'MarksEntryController@updateMarks');
        

        //for All Formative Subject Simultanious Marks Entry and Ajax Save
        Route::get('/clssecstd-MarksEntryForAllSubj/{extpmdcl_id}/{clsc_id}', 'MarksEntryController@clssecstdMarksEntryForAllSubj');
        //Ajax Update
        Route::post('/updateForAllSubjMarks', 'MarksEntryController@updateForAllSubjMarks');







        Route::get('/exmtypclssubTaskpane', 'BaseController@exmtypclssubTaskpane');
        Route::get('/exmtypclssubfmEntry/{clss_id}', 'BaseController@exmtypclssubfmEntry');
        Route::get('/exmtypclssubfmView/{clss_id}', 'BaseController@exmtypclssubfmView');
        Route::post('/exmtypclssubfmEntry-submit', 'BaseController@exmtypclssubfmEntrySubmit');

        Route::get ('/classPromotionalRulesEntry/{clss_id}', 'BaseController@classPromotionalRulesEntry');
        Route::post('/classPromotionalRulesEntry-Submit', 'BaseController@classPromotionalRulesEntrySubmit');
        

        Route::get('/exmtypmodclssubfmEntry/{clss_id}', 'ModefmController@exmtypmodclssubfmEntry');
        Route::post('/exmtypmodclssubfmEntry-Submit', 'ModefmController@exmtypmodclssubfmEntrySubmit');
        Route::get('/exmtypmodclssubfmEntry-View/{clss_id}', 'ModefmController@exmtypmodclssubfmEntryView');
        Route::get('/test', 'BaseController@test');
        Route::get('/testRoute/{etmcs_id}/{csec_id}/{teacher_id}', 'BaseController@testRoute')->name('testRoute');
        // Route::get('/exmtypclssub', 'BaseController@exmtypclssub');
        // Route::post('/exmtypclssub-submit', 'BaseController@exmtypclssubSubmit');
        // Route::get('/exmtypclssub-view', 'BaseController@exmtypclssubView');







        Route::get('/studentdb', 'StudentController@studentdb');
        Route::post('/studentdb-submit', 'StudentController@studentdbSubmit'); // for new student data submit

        Route::get('/studentdbEditpage/{studentdb_id}', 'StudentController@studentdbEditpage');
        Route::post('/studentdbEditpage-submit', 'StudentController@studentdbEditpageSubmit');
        
        Route::post('/studentdbEdit-submit', 'StudentController@studentdbEditSubmit'); // modal data submit

        Route::post('/studentdbmultipage-stdIdSubmit', 'StudentController@stdIdSubmit'); // modal data submit
        
        //Ajax Update
        Route::post('/updateSection', 'StudentController@updateSection');




        Route::get('/studentdbmultipage', 'StudentController@studentdbmultipage');
        Route::post('/studentdbmultipage-submit', 'StudentController@studentdbmultipageSubmit');
        Route::get('/studentdbmultipage-search', 'StudentController@studentdbmultipageSearch');
        Route::get('/studentdbmultipage-view', 'StudentController@studentdbmultipageView');
        Route::get('/studentdbmultipage-edit/{id}', 'StudentController@studentdbmultipageEdit');
        Route::post('/studentdbmultipageEdit-submit', 'StudentController@studentdbmultipageEditSubmit');
        
        
        Route::get('/studentdbmultipage-listToUpdateSection', 'StudentController@studentdbmultipageListToUpdateSection');
        //Ajax Update
        Route::post('/studentdbmultipage-updateSection', 'StudentController@studentdbmultipageUpdateSection');
        Route::post('/studentdbmultipage-verifySection', 'StudentController@studentdbmultipageVerifySection');







        Route::get('/finalizeParticulars', 'FinalizeController@finalizeParticulars');
        Route::get('/finalizeParticulars-Refresh', 'FinalizeController@finalizeParticularsRefresh')->name('finalizeParticulars-Refresh');
        Route::get('/btn-finalize/{n}','FinalizeController@btnFinalize');
        Route::get('/btn-unfinalize/{n}','FinalizeController@btnUnFinalize');

        Route::get('/finalizeSessions', 'FinalizeController@finalizeSessions');
        Route::get('/finalizeSchool', 'FinalizeController@finalizeSchool')->name('finalizeSchool');



        Route::get('/clssec-ResultTaskpane/{clssec_id}', 'ResultController@ResultTaskpane');
        Route::get('/clssec-ResultSheet/{clssec_id}/{studentcr_id}', 'ResultController@ResultSheet');
        Route::get('/clssec-ResultSheetHTML/{clssec_id}/{studentcr_id}', 'ResultController@ResultSheetHTML');
        Route::get('/clssec-ResultSheetPDF/{clssec_id}/{studentcr_id}', 'ResultController@ResultSheetPDF');
        Route::get('/clssec-ResultSheetFPDF/{clssec_id}/{studentcr_id}', 'ResultController@ResultSheetFPDF');


        
        Route::get('/ExStudentDb', 'ExcelController@ExStudentDb');
        Route::get('/ExcelSheetExStudentDb', 'ExcelController@ExcelSheetExStudentDb');

        //Route::get('/PdfSheetExStudentDb', 'PdfController@PdfSheetExStudentDb');
        //Route::get('/HtmlSheetExStudentDb', 'PdfController@HtmlSheetExStudentDb');
        //Route::get('/clssec-ResultSheetHTML/{clssec_id}/{studentcr_id}', 'PdfController@ResultSheetHTML');



        //Anwer Script Manipulation
        Route::get('/answerScript-taskpane','AnswerScriptController@answerScriptTaskpane');
        Route::get('/answerscript-distribution/{exam_id}/{clss_id}','AnswerScriptController@answerscriptDistribution');
        Route::post('/answerscript-distribution-addsubject', 'AnswerScriptController@answerscriptDistributionAddSubject');
        Route::get('/answerScript-clss-sectionAllotment/{exam_id}/{extype_id}', 'AnswerScriptController@answerscriptClssSectionAllotment');
        Route::get('/answerScript-teacherAllotment/{exam_id}/{extype_id}', 'AnswerScriptController@answerscriptTeacherAllotment');


        Route::get('/answerScript-clss-sectionStatus/{exam_id}/{extype_id}/{is_pdf}', 'AnswerScriptController@answerscriptClssSectionStatus');
        Route::get('/answerScript-clss-sectionStatusForm/{exam_id}/{extype_id}/{is_pdf}', 'AnswerScriptController@answerscriptClssSectionStatusForm');


        Route::get('/classTeacherInfo', 'ClassTeacherController@ClassTeacherInfo');

        Route::get('/mpdfBengaliTestpage', 'TestController@mpdfBengaliTestpage');



        Route::get('/clssec-gradeStatus/{clss_id}', 'ClssecGradeController@clssecGradeStatus');
        Route::get('/clssec-gradeStatusPDF/{clss_id}', 'ClssecGradeController@clssecGradeStatusPDF');
        Route::get('/clssec-gradeDstatus/{clssec_id}', 'ClssecGradeController@clssecGradeDStatus');
});
  
Route::get('/get-logout', function(){
   auth()->logout();    
   Session::flush();
   return redirect('/');
});



