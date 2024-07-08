<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\SubmittedCase;
use App\Models\User;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Storage;
class StudentRouteController extends Controller
{
    public function studentDashBoard() {
        $t = SubmittedCase::where('username', Session::get('sessionStudent'))->count();
        $p = SubmittedCase::where('tracking', 0)->count();
        $o = SubmittedCase::where('tracking', 1)->count();
        $c = SubmittedCase::where('tracking', 2)->count();


        $auth = Student::where('username', Session::get('sessionStudent'))->first();
        $auth = $auth->status;
   //     dd($auth);
        $data = array();
        if(Session::has('sessionStudent')) {
            $data = User::where('username', Session::get('sessionStudent'))->first();
        }
        return view('student.student-dashboard', compact('data', 'auth', 't', 'p', 'o', 'c'));
    }

    public function studentProfile() {
        $auth = Student::where('username', Session::get('sessionStudent'))->first();
        $auth = $auth->status;
        return view('student.student-profile', compact('auth'));
    }

    public function studentSubmitCase() {
        $auth = Student::where('username', Session::get('sessionStudent'))->first();
        $auth = $auth->status;
        return view('student.student-submit-case', compact('auth'));
    }

    public function studentViewCase($view_case) {
        $auth = Student::where('username', Session::get('sessionStudent'))->first();
        $auth = $auth->status;
       $cases = SubmittedCase::where('session', $view_case)->get();
      // dd($cases);
        return view('student.student-view-case', ['cases' => $cases, 'auth' => $auth]);
    }



    public function view($view) {
        $auth = Student::where('username', Session::get('sessionStudent'))->first();
        $auth = $auth->status;
        $cases = SubmittedCase::findOrFail($view);

        $fileTypes = explode('.', $cases->file);
        $index = count($fileTypes);
        $fileTypes = $index - 1;
          return view('student.student-view', [
            'cases' => $cases,
            'fileTypes' => $fileTypes,
            'auth' => $auth
        ]);
      }

      public function track($id) {
        $case = SubmittedCase::findOrFail($id);
        $auth = Student::where('username', Session::get('sessionStudent'))->first();
        $auth = $auth->status;
      //  dd($case->caseHandler);

        $c = explode(' ', $case->caseHandler);
        $count = count($c);
        $count = $count - 1;
        $track = 0;
        return view('student.student-track', [
            'case' => $case,
            'c' => $c,
            'count' => $count,
            'track' => $track,
            'auth' => $auth
        ]);
      }

    }

