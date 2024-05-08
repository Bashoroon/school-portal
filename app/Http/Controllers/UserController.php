<?php

namespace App\Http\Controllers;

use App\Models\Clazz;
use App\Models\Promotedstudent;
use App\Models\Session;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request): RedirectResponse
    {
        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;

        $user->save();

        return redirect('/')->with('success', 'Teacher added successfully');
    }

    public function show()
    {

        $staffs = User::whereNotIn('role', ['admin'])
            ->where('status', '=', 1)
            ->orderBy('id', 'asc')
            ->take(6)
            ->get();

        $sessions = Session::all();
        $classes = Clazz::all();

        $promotedStudents = PromotedStudent::with('student:admissionNo,surname,firstName,lastName')
            ->where('deleteStatus', '!=', 1)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();

            $noStudent = Promotedstudent::where('deleteStatus', '!=', 1)
            ->count();

            $noStaff = User::where('status', '=', 1)
            ->count();

        return view('welcome')->with(compact('staffs', 'sessions', 'classes', 'promotedStudents', 'noStudent', 'noStaff'));
    }
}
