<?php

namespace App\Http\Controllers;

use App\Mail\StudentApplicationMail;
use App\Student;
use Illuminate\Http\Request;
use Mail;
use Session;

class HomeController extends Controller
{
    public function profile()
    {
        return view('modules.profile.index');
    }

    public function ohshit(Request $request)
    {
        $this->validate($request, [
            'email' => 'sometimes|required|max:191|email',
            'contact_number' => 'numeric',
            'guardian_contact' => 'numeric',
        ]);

        auth()->user()->student->update($request->all());
        return back();
    }

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['submitstudentApplication', 'studentApplication']]);
    }

    public function index()
    {
        return view('modules.home.index');
    }

    public function studentApplication()
    {
        return view('modules.home.student_application');
    }

    public function submitstudentApplication(Request $request)
    {
        $this->validate($request, [
            'email' => 'sometimes|required|max:191|email|unique:users',
        ]);
        $code = 'S-' . mt_rand(5, 99999);
        $request->verification_code = $code;
        $student = new Student;
        $request->request->add(['verification_code' => $code]);
        $student->fill($request->all())->save();
        Mail::to($request->email)->send(new StudentApplicationMail($code));
        Session::flash('flash_message', 'Your code is ' . $code);
        return redirect()->back();
    }
}
