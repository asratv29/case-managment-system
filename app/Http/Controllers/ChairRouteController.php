<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\ChairCase;
use App\Models\CHead;
use App\Models\DeanCase;
use App\Models\Instructor;
use App\Models\InstructorCase;
use App\Models\SubmittedCase;
use DB;
use Illuminate\Http\Request;

class ChairRouteController extends Controller
{
    public function chairLogin() {
        return view('chairman.chairman-dashboard');
    }
    public function viewCase($view) {
       $chair = Chair::where('username', $view)->first();

      // dd($chair->chead->course);

       $cases = ChairCase::where('caseHandler', $chair->chead->course)->get();
 //      $cases = DB::table('chair_cases')->pluck('caseHandler');
 //      $chead = DB::table('c_heads')->pluck('course');


      //  dd($chair->chead->course);

        return view('chairman.chairman-view-complaint', ['cases' => $cases]);
    }

    public function view($id) {

        $cases = ChairCase::where('id', $id)->first();

        $ch = CHead::where('course', $cases->caseHandler)->first();

        $i = Instructor::where('chair_id', $ch->chair->id)->pluck('username');

      //  dd($i);

        $fileTypes = explode('.', $cases->file);
        $index = count($fileTypes);
        $fileTypes = $fileTypes[$index - 1];

      //  dd($ch->chair->id);

        return view('chairman.chair-case-view', [
            'cases' => $cases,
            'fileTypes' => $fileTypes,
            'i' => $i
        ]);
    }

    public function response(Request $request, $token) {
        $request->validate([
            'response' => 'required',
            'forward' => 'required'
        ]);
       // dd($request->forward);
        $case = ChairCase::where('token', $token)->first();
      //  dd($case);

        if($request->forward == 'Dean') {
            $c = DeanCase::where('token', $token)->first();
            if($c) {
               $update = [
                'description' => $request->response,
                'tracking' => 1
               ];


               DB::table('dean_cases')->where('token', $token)->update($update);

              DB::table('chair_cases')->where('token', $token)->update($update);

              DB::table('instructor_cases')->where('token', $token)->update($update);

               $studentUpdate = SubmittedCase::where('token', $token)->pluck('caseHandler')->first();

               $a = explode(' ', $studentUpdate);

               $c = count($a);

               $i = $c - 1;

               if($a[$i] == 'Dean') {
          //      echo 'i';
               } else {

                DB::table('submitted_cases')
                ->where('token', $token)
                ->update(['caseHandler' => $studentUpdate . " " . $request->forward.'>'.'Chair']);

               }

               Session()->flash('successCaseSubmission', 'Your case has been updated to dean');
                return redirect()->back();
            } else {

                $dc = new DeanCase();


                $dc->fullname =$case->fullname;
                $dc->email = $case->email;
                $dc->username = $case->username;
                $dc->role = $case->role;
                $dc->dept = $case->dept;
                $dc->year = $case->year;
                $dc->semister = $case->semister;
                $dc->caseHandler = $case->caseHandler ;
                $dc->routedCaseHandler = '';
                $dc->case = $case->case;
                $dc->file = $case->file;
                $dc->description = $case->description;
                $dc->rdescription = '';
                $dc->session = $case->session;
                $dc->tracking = 0;
                $dc->token = $token;
                $dc->phone = $case->phone;
                $dc->gender = $case->gender;

                $dc->save();

                $studentUpdate = SubmittedCase::where('token', $token)->pluck('caseHandler')->first();

                DB::table('submitted_cases')
                 ->where('token', $token)
                 ->update(['caseHandler' => $studentUpdate . " " . $request->forward.'>'.'Chair']);


                Session()->flash('successCaseSubmission', 'Your case has been submitted to dean');
                return redirect()->back();

            }

        } elseif($request->forward == 'Instructor') {
           // $caseInstructor = '';
            $c = InstructorCase::where('token', $token)->first();
            if($c) {

                $update = [
                    'description' => $request->response,
                    'tracking' => 1
                   ];




                   DB::table('instructor_cases')->where('token', $token)->update($update);

                   $studentUpdate = SubmittedCase::where('token', $token)->pluck('caseHandler')->first();

                   $a = explode(' ', $studentUpdate);

                   $c = count($a);

                   $i = $c - 1;

                   if($a[$i] == 'Instructor') {
                    echo 'i';
                   } else {

                    DB::table('submitted_cases')
                    ->where('token', $token)
                    ->update(['caseHandler' => $studentUpdate . " " . $request->forward.'>'.$request->instructor, 'tracking' => 1]);

                   }

                   Session()->flash('successCaseSubmission', 'Your case has been updated to instructor');
                    return redirect()->back();

            } else {

                $ic = new InstructorCase();


                $ic->fullname =$case->fullname;
                $ic->email = $case->email;
                $ic->username = $case->username;
                $ic->role = $case->role;
                $ic->dept = $case->dept;
                $ic->year = $case->year;
                $ic->semister = $case->semister;
                $ic->caseHandler = $request->instructor;
                $ic->routedCaseHandler = $case->caseHandler;
                $ic->case = $case->case;
                $ic->file = $case->file;
                $ic->description = $case->description;
                $ic->rdescription = '';
                $ic->session = $case->session;
                $ic->tracking = 0;
                $ic->token = $token;
                $ic->phone = $case->phone;
                $ic->gender = $case->gender;

                $ic->save();

                $studentUpdate = SubmittedCase::where('token', $token)->pluck('caseHandler')->first();

                DB::table('submitted_cases')
                 ->where('token', $token)
                 ->update(['caseHandler' => $studentUpdate . " " . $request->forward.'>'.$request->instructor, 'tracking' => 1]);


                Session()->flash('successCaseSubmission', 'Your case has been submitted to Instructor');
                return redirect()->back();

            }

        } elseif($request->forward == 'Student') {
            $c = SubmittedCase::where('token', $token)->first();
            if($c) {

                $update = [
                    'rdescription' => $request->response,
                    'tracking' => 2
                ];

                $a = DB::table('submitted_cases')->where('token', $token)->update($update);
                $a = DB::table('chair_cases')->where('token', $token)->update(['tracking' => 2]);


                Session()->flash('successCaseSubmission', 'Your case has been updated to student');
                return redirect()->back();

            }

        }
    }
}
