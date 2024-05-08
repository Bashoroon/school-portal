<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\Clearance;
use App\Models\promotedstudent;
use App\Models\Session;
use App\Models\Student;
use App\Models\Term;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create(Request $request): RedirectResponse {

     if (Student::where('admissionNo', $request->admissionNo)->exists()) {
        return redirect('/')->with('error', 'Admission Number already exists');
     }
        $student = new Student;
        $year = substr(date('Y'), 2);
        $uniq = mt_rand(1000, 9999);
        $admissionNo= "";
        if ($_POST['admissionNo'] == "") {
            $admissionNo = 'TSSCOL'.$year.$uniq;
        }else{
            $admissionNo = $request->admissionNo;
        }
        $student->admissionNo = $admissionNo;
        $fullname = $request->fullname;
        
        $nameParts = explode(' ', $fullname);
        $surname = $nameParts[0];
        $firstname = $nameParts[1];
        $lastname = $nameParts[2];
        
        $student->session =$request->session;
        $student->class = $request->class;
        $student->surname = $surname;
        $student->firstName = $firstname;
        $student->lastName = $lastname;
        $student->gender = $request->gender;
        
        $promotedstudent = new Promotedstudent();

        // Fill the Student model with the specific fields from the request
        $promotedstudent->admissionNo =  $admissionNo; // If admissionNo is not provided, set it to an empty string
        $promotedstudent->session = $request->session;
        $promotedstudent->class = $request->class;
    
        // Save the student record
        $student->save();

         // Save the promotedstudent record
         $promotedstudent->save();
    
    
        return redirect('/')->with('student-success', 'Student added successfully');
    }

  
        // view student by class
    public function process_view_student(Request $request){

        $process = new Student();

        $process->session = $request->seesion;
        $process->class = $request->class;

        return redirect("/view-student/{$request->session}/{$request->class}");
        
        
    }

    // view all student
    public function all_student(){

        $allStudents = Student::all();

        return view('all-student')->with(compact('allStudents'));


    }

    public function edit($admissionNo){

        $find = Student::where('admissionNo', $admissionNo)->first();
       
        return view('a-student')->with(compact('find'));
    }

    

    public function update(Request $request, $admissionNo){
        $found = Student::where('admissionNo', $admissionNo)->first();
      
      
    
        if (!$found) {
            // Handle case where student with given admission number is not found
            return redirect()->back()->with('error', 'Student not found');
        }
    
        // Assuming 'surname' is a valid property in your Student model
        $found->firstName = $request->surname; // Assuming 'firstName' is correct property name
        $found->firstName = $request->firstname; // Assuming 'lastName' is correct property name
        $found->lastName = $request->lastname;
        $found->dob = $request->dob;
        $found->state = $request->state;
        $found->lga = $request->lga;
        $found->address = $request->address;
        $found->phone = $request->phone;
        $found->pob = $request->pob;
    
        // Store the image
        if ($request->hasFile('passport')) {
            $path = $request->file('passport')->store('images/passport', 'public');
            $found->passport = $path;
        }
    
        $found->save();
    
        return redirect()->back()->with('success', 'Student updated successfully');
    }
    
    // Delete Student
    public function delete_student($admissionNo){
        
        $delete = DB::table('promotedstudent')->where('admissionNo', '=', $admissionNo)->update(['deleteStatus' => 1]);

        return redirect()->back()->with('update-success', 'Student DELETED successfully');

    }


    // promote student

    public function process_promote_student(Request $request){

        $process = new Student();

        $process->session = $request->seesion;
        $process->class = $request->class;

        return redirect("/promote-student/{$request->session}/{$request->class}");
        
        
    }
    
    public function promote_student($session, $class){

        $promotedStudents = Promotedstudent::with('student:admissionNo,surname,firstName,lastName')
        ->where('deleteStatus', '!=', 1)
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->orderBy('id', 'desc')
        ->get();

        $sessions = Session::all();
        $classes = Clazz::all();
    return view('promote-student', ['session' => $session, 'class' => $class])->with(compact('promotedStudents', 'sessions', 'classes'));

    }

    public function submit_promoted_student(Request $request){

        // Extract session and class from the request
        $session = $request->session;
        $class = $request->class;
    
        // Loop through each admission number
        foreach ($request->admissionNo as $admissionNo) {
            // Create a new instance of Promotedstudent for each admission number
            $promoted = new Promotedstudent;
    
            // Assign session, class, and admission number
            $promoted->session = $session;
            $promoted->class = $class;
            $promoted->admissionNo = $admissionNo;
            
            // Save the record
            $promoted->save();
        }
        
        return redirect()->back()->with('success', 'Students promoted successfully');
    }

    public function process_clearance(Request $request){

        $session = $request->session;
        $class = $request->class;
        $term = $request->term;

        return redirect("/clearance/{$session}/{$class}/{$term}");



    }

    public function clearance($session, $class, $term){

        $promotedStudents = Promotedstudent::with('student:admissionNo,surname,firstName,lastName')
        ->where('deleteStatus', '!=', 1)
        ->where('session', '=', $session)
        ->where('class', '=', $class)
        ->orderBy('id', 'desc')
        ->get();

        $sessions = Session::all();
        $classes = Clazz::all();
        $terms = Term::all();
    return view('clearance', ['session' => $session, 'class' => $class, 'term' => $term])->with(compact('promotedStudents', 'sessions', 'classes'));
    }


    // Submit clearance
    public function submit_clearance(Request $request){

      // Extract session and class from the request
      $session = $request->session;
      $class = $request->clazz;
      $term = $request->term;
  
      // Loop through each admission number
      foreach ($request->admissionNo as $admissionNo) {
          // Create a new instance of Promotedstudent for each admission number
          $clearance = new Clearance();
        
          // Assign session, class, and admission number
          $clearance->session = $session;
          $clearance->class = $class;
          $clearance->term = $term;
          $clearance->admissionNo = $admissionNo;
          
          // Save the record
          $clearance->save();
      }
      
      return redirect()->back()->with('success', 'Students promoted successfully');
  }

  public function delete_clearance(Request $request) {
    // Loop through each admission number
    foreach ($request->admissionNo as $admissionNo) {
        // Find the Clearance record by admission number
        $clearance = Clearance::where('admissionNo', $admissionNo)->first();
        
        // If the record exists, delete it
        if ($clearance) {
            $clearance->delete();
        }
    }
    
    return redirect()->back()->with('success', 'Clearance records deleted successfully');
}


}
