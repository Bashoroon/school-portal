<?php

use App\Http\Controllers\ExamRecordContoller;
use App\Http\Controllers\UserController; 
use App\Http\Controllers\SessionController;
use App\Http\Controllers\StudentController;
use App\Models\Clazz;
use App\Models\Promotedstudent;
use App\Models\Session;
use App\Models\Subject;
use App\Models\Term;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// all my forms
Route::get('/student/{name}', function ($name) {

    $sessions = Session::all();
    $classes = Clazz::all();
    $terms = Term::all();
    $subjects = Subject::all();
    return view('form.forms')->with(compact('sessions', 'classes', 'terms', 'subjects', 'name'));
})->name('student');

// View Student by class
Route::get('/view-student/{session}/{class}', function ($session, $class) {

    $promotedStudents = Promotedstudent::with('student:admissionNo,surname,firstName,lastName')
        ->where('deleteStatus', '!=', 1)
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->orderBy('id', 'desc')
        ->get();

    return view('view-student', ['session' => $session, 'class' => $class])->with(compact('promotedStudents'));
});

// Add Staff
Route::post('/submit', [UserController::class, 'create'])->name('users.create');
//Add Student
Route::post('/submitStudent', [StudentController::class, 'create'])->name('student.create');

// process view student
Route::get('/processViewStudent', [StudentController::class, 'process_view_student'])->name('student.process');

//process promoted student
Route::get('/processPromoteStudent', [StudentController::class, 'process_promote_student'])->name('promote.process');

// view student singular by admission
Route::get('/view-student/{admissionNo}', [StudentController::class, 'edit'])->name('student.edit');

// View Staffs
Route::get('/', [UserController::class, 'show'])->name('users.show');

// Update Student
Route::post('/update-student/{admissionNo}', [StudentController::class, 'update'])->name('student.update');

//Delete Student
Route::get('/delete/{admissionNo}', [StudentController::class, 'delete_student'])->name('student.delete');

// View All studeny
Route::get('/all-student', [StudentController::class, 'all_student'])->name('allStudent.show');
Route::get('/promote-student/{session}/{class}', [StudentController::class, 'promote_student'])->name('student.promote');

// promote student and insert into  promotedstudents
Route::POST('/promoting', [StudentController::class, 'submit_promoted_student'])->name('promoting.student');

// Clearnce 
Route::get('/clearance/{session}/{term}/{class}', [StudentController::class, 'clearance'])->name('clearance');
Route::get('/processClearance', [StudentController::class, 'process_clearance'])->name('clearance.process');
Route::post('/submitClearance', [StudentController::class, 'submit_clearance'])->name('submit.clearance');
Route::post('/deleteClearance', [StudentController::class, 'delete_clearance'])->name('delete.clearance');


// Process Record
Route::get('/processRecord', [ExamRecordContoller::class, 'process_record'])->name('record.process');
Route::get('/examAndRecord/{session}/{term}/{class}/{subject}', [ExamRecordContoller::class, 'list_of_student'])->name('student.list');

Route::post('/submitScores', [ExamRecordContoller::class, 'submit_student_scores'])->name('submit.scores');


// View Score sheet
Route::get('/processViewScoreSheet', [ExamRecordContoller::class, 'process_view_scoreSheet'])->name('viewScoreSheet.process');
Route::get('/scoreSheet/{session}/{term}/{class}/{subject}', [ExamRecordContoller::class, 'scoreSheet_list_of_student'])->name('scoreSheetstudent.list');

// eDIT AND UPDATE SCORES
Route::get('/editScores/{id}', [ExamRecordContoller::class, 'edit'])->name('edit.score');
Route::get('/edit/{id}', [ExamRecordContoller::class, 'edit'])->name('edit.score');
Route::post('/update/{id}', [ExamRecordContoller::class, 'update'])->name('update.score');


// View Broad sheet
Route::get('/processViewBroadSheet', [ExamRecordContoller::class, 'process_view_broadSheet'])->name('viewBroadSheet.process');
Route::get('/broadSheet/{session}/{term}/{class}', [ExamRecordContoller::class, 'broadSheet_list_of_student'])->name('broadSheetstudent.list');

// View Report Sheet
Route::get('/processViewReportSheet', [ExamRecordContoller::class, 'process_view_reportSheet'])->name('viewReportSheet.process');
Route::get('/reportSheet/{session}/{class}', [ExamRecordContoller::class, 'reportSheet_list_of_student'])->name('reportSheetstudent.list');
Route::get('/report/{session}/{term}/{class}/{admissionNo}', [ExamRecordContoller::class,'report'])->name('report');

// Comment Student
Route::get('/processCommentStudent', [ExamRecordContoller::class, 'process_comment'])->name('comment.process'); 
// Rouet::get('/comment/{session}/{term}/{class}', ExamRecordContoller::class, '')
// Route::get('/portal/student', function () {
//     return view('index', [
//         'heading' => 'Student information',
//         'studentInfo' => [
//             [
//                 'id'=> 1,
//                 'fullname' => 'Lawal Sherif Oyetola',
//                 'Class' => 'SSS 3',
//                 'School' => 'Tender Steps'
//             ],
//             [
//                 'id' => 2,
//                 'fullname' => 'Balogun Hadrat',
//                 'Class' => 'SSS 3',
//                 'School' => 'Tender Steps'
//             ]
//         ]
//     ]);
// });

// Route::get('/portal/student/{id}', function($id){
//     return view('studentEdit', $id);
// });