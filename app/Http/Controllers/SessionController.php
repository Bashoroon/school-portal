<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function show() {
        
        $sessions = Session::all();

        return view('welcome', ['sessions' => $sessions]);

        
    }
}
