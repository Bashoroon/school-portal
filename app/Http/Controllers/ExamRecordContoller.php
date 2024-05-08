<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\ExamRecord;
use App\Models\Promotedstudent;
use App\Models\SchoolAttendance;
use App\Models\Session;
use App\Models\Student;
use App\Models\StudentAttendance;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExamRecordContoller extends Controller
{


    public function process_record(Request $request){

        $session = $request->session;
        $class = $request->class;
        $term = $request->term;
        $subject = $request->subject;

        return redirect("/examAndRecord/{$session}/{$term}/{$class}/{$subject}");



    }

    // list of student for the class

    public function list_of_student($session, $term, $class, $subject){

        $promotedStudents = Promotedstudent::with('student:admissionNo,surname,firstName,lastName')
        ->where('deleteStatus', '!=', 1)
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->orderBy('id', 'desc')
        ->get();
     
       

        $sessions = Session::all();
        $classes = Clazz::all();
      
    return view('record-scores', ['session' => $session, 'class' => $class, 'term' => $term, 'subject' => $subject ])->with(compact('promotedStudents', 'sessions', 'classes'));

    }
    // submit scores
    public function submit_student_scores(Request $request)
    {
        // Extract session, class, and term from the request
        $session = $request->session;
        $class = $request->class;
        $term = $request->term;
        $subject = $request->subject;
    
        // Loop through each admission number
        foreach ($request->admissionNo as $admissionNo) {
            // Retrieve test and exam scores for the current student
            $test = $request->input("test.$admissionNo");
            $exam = $request->input("exam.$admissionNo");
    
            // Check if both test and exam scores are provided
            if ($test !== null && $exam !== null) {
                // Create a new instance of ExamRecord for each admission number
                $record = new ExamRecord();
    
                // Assign session, class, term, admission number, test, and exam scores
                $record->session = $session;
                $record->class = $class;
                $record->term = $term;
                $record->subject = $subject;
                $record->admissionNo = $admissionNo;
                $record->test = $test;
                $record->exam = $exam;
    
                // Save the record
                $record->save();
            }
        }
    
        return redirect()->back()->with('success', 'Scores submitted successfully');
    }


    // view proceess view score sheet
     public function process_view_scoreSheet(Request $request){

        $session = $request->session;
        $class = $request->class;
        $term = $request->term;
        $subject = $request->subject;

        return redirect("/scoreSheet/{$session}/{$term}/{$class}/{$subject}");
     }


     //view student for score sheet

     public function scoreSheet_list_of_student($session, $term, $class, $subject){

        $promotedStudents = Promotedstudent::with('student:admissionNo,surname,firstName,lastName')
        ->where('deleteStatus', '!=', 1)
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->orderBy('id', 'desc')
        ->get();
     
       

        $sessions = Session::all();
        $classes = Clazz::all();
      
    return view('score-sheet', ['session' => $session, 'class' => $class, 'term' => $term, 'subject' => $subject ])->with(compact('promotedStudents', 'sessions', 'classes'));

    }

    // Edit scores

    public function edit($id){

            $find = ExamRecord::find($id);
            
            return view('edit-scores')->with(compact('find'));
    }

    // update scores
    public function update(Request $request, $id){
        $test = $request->test;
        $exam = $request->exam;

        $update = DB::table('studentscores')->where('id', '=', $id)->update(['test' => $test, 'exam' => $exam]);

        return redirect()->back()->with('update-success', 'Student scores UPDATED successfully');

    }


     // view proceess view Broad sheet
     public function process_view_broadSheet(Request $request){

        $session = $request->session;
        $class = $request->class;
        $term = $request->term;
      

        return redirect("/broadSheet/{$session}/{$term}/{$class}");
     }
    

     // View broad sheet
     public function broadSheet_list_of_student($session, $term, $class){

        $broadsheets = ExamRecord::select('admissionNo')
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->where('term', '=', $term)
        ->groupBy('admissionNo')
        ->get();
        
        $subjects = ExamRecord::select('subject')
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->where('term', '=', $term)
        ->groupBy('subject')
        ->get();

       

        $sessions = Session::all();
        $classes = Clazz::all();
      
    return view('broad-sheet', ['session' => $session, 'class' => $class, 'term' => $term ])->with(compact('broadsheets', 'subjects', 'sessions', 'classes'));

    }

    // view proceess view Broad sheet
    public function process_view_reportSheet(Request $request){

        $session = $request->session;
        $class = $request->class;
        //$term = $request->term;
      

        return redirect("/reportSheet/{$session}/{$class}");
     }


      // View broad sheet
      public function reportSheet_list_of_student($session,  $class){

        $reports = ExamRecord::select('admissionNo')
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->groupBy('admissionNo')
        ->get();
        
       

       

        $sessions = Session::all();
        $classes = Clazz::all();
      
    return view('view-student-report', ['session' => $session, 'class' => $class ])->with(compact('reports',  'sessions', 'classes'));

    }
    
    
    public function report($session, $term, $class, $admissionNo){

        
        $results = ExamRecord::where('session', '=', $session)
        ->where('class', '=', $class)
        ->where('term', '=', $term)
        ->where('admissionNo', '=', $admissionNo)
        ->get();

       

        $myName= Student::where('admissionNo', '=', $admissionNo)
        ->first();

        $schoolAttendance = SchoolAttendance::where('session', $session)
        ->where('term', $term)
        ->first();

        $studentAtt = StudentAttendance::where('session', $session)
        ->where('term', $term)
        ->where('class', $class)
        ->where('admissionNo', '=', $admissionNo)
        ->first();
        return view('report-sheet', ['session' => $session, 'term' => $term,'class' => $class,  'admissionNo' => $admissionNo ])->with(compact('results', 'myName', 'schoolAttendance', 'studentAtt'));
    }

    public function process_comment(Request $request){

        $session = $request->session;
        $term = $request->term;
        $class = $request->class;
        //$term = $request->term;
      

        return redirect("/comment/{$session}/{$term}/{$class}");
     }


}
