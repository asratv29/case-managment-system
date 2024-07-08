<?php

namespace App\Http\Controllers;

use App\Models\Chair;
use App\Models\ChairCase;
use App\Models\Dean;
use App\Models\DeanCase;
use App\Models\InstructorCase;
use App\Models\SubmittedCase;
use DB;
use Illuminate\Http\Request;

class InstructorRouteController extends Controller
{
     public function instructorLogin() {
        return view('instructor.instructor-dashboard');
    }

    public function viewCase($user) {
       // $cases = DB::table('instructor_cases')->where('caseHandler', $user)->get();

        $cases = InstructorCase::where('caseHandler', $user)->get();
        return view('instructor.instructor-view-complaint', ['cases' => $cases]);
    }
    public function view($id) {
        $case = InstructorCase::findOrFail($id);
        $fileTypes = explode('.', $case->file);
        $index = count($fileTypes);
        $fileTypes = $index - 1;
          return view('instructor.instructor-view', [
            'case' => $case,
            'fileTypes' => $fileTypes
        ]);
    }
    public function response(Request $request, $token) {
        $request->validate([
            'response' => 'required',
            'forward' => 'required'
        ]);

        $case = InstructorCase::where('token', $token)->first();
        //dd($case);

            if($case) {
                $tracking = [
                    'tracking' => 1,
                ];

                DB::table('submitted_cases')
                ->where('token', $token)
                ->update($tracking);

                DB::table('instructor_cases')
                ->where('token', $token)
                ->update(['tracking' => 2]);

               if($request->forward == "Dean") {
                    $Case = DeanCase::where('token', $token)->first();

                    if($Case) {
                        DB::table('dean_cases')
                        ->where('token', $token)
                        ->update($tracking);

                        Session()->flash('success', 'The case has been updated to Dean');
                        return redirect()->back();
                    } else {
                        $dean = new DeanCase();
                        $dean->fullname = $case->fullname;
                        $dean->email = $case->email;
                        $dean->username = $case->username;
                        $dean->role = $case->role;
                        $dean->dept = $case->dept;
                        $dean->year = $case->year;
                        $dean->semister = $case->semister;
                        $dean->caseHandler = $case->caseHandler;
                        $dean->routedCaseHandler = $request->forward;
                        $dean->case = $case->case;
                        $dean->file = $case->file;
                        $dean->description = $request->response;
                        $dean->rdescription = '';
                        $dean->session = $case->session;
                        $dean->tracking = 0;
                        $dean->token = $token;
                        $dean->phone = $case->phone;
                        $dean->gender = $case->gender;
                        $dean->save();

                        Session()->flash('success', 'The case has been forwarded to Dean');
                        return redirect()->back();
                    }
                } elseif($request->forward == "Chair") {

                    $case = ChairCase::where('token', $token)->first();
                    $ase = InstructorCase::where('token', $token)->first();


                    if($case) {
                        $update = [
                            'rdescription' => $request->response,
                            'tracking' => 2
                        ];

                        DB::table('chair_cases')->where('token', $token)->update($update);

                        $studentUpdate = SubmittedCase::where('token', $token)->pluck('caseHandler')->first();

                        DB::table('submitted_cases')
                        ->where('token', $token)
                        ->update(['caseHandler' => $studentUpdate . " " . $ase->routedCaseHandler.'>'.'Chair']);

                        DB::table('chair_cases')
                        ->where('token', $token)
                        ->update(['tracking' => 1, 'caseHandler' => $case->caseHandler, 'routedCaseHandler' => $ase->caseHandler]);




                        Session()->flash('success', 'The case has been updated to Chair');
                        return redirect()->back();
                    }

                    } else {

                        $chair = new Chair();
                        $chair->fullname = $case->fullname;
                        $chair->email = $case->email;
                        $chair->role = $case->role;
                        $chair->dept = $case->dept;
                        $chair->year = $case->year;
                        $chair->semister = $case->semister;
                        $chair->caseHandler = $case->caseHandler;
                        $chair->case = $case->case;
                        $chair->file = $case->file;
                        $chair->description = $case->description;
                        $chair->rdescription = '';
                        $chair->session = $case->session;
                        $chair->tracking = 0;
                        $chair->phone = $case->phone;
                        $chair->gender = $case->gender;
                        $chair->save();

                        $studentUpdate = SubmittedCase::where('token', $token)->pluck('caseHandler')->first();

                        DB::table('submitted_cases')
                        ->where('token', $token)
                        ->update(['caseHandler' => $studentUpdate . " " . $case->routedCaseHandler.'>'.'Chair']);


                        Session()->flash('success', 'The case has been forwarded to Chair');
                        return redirect()->back();
                    }

                }  elseif($request->forward == "Student") {
                    $cases = SubmittedCase::where('token', $token)->first();
                //    dd($cases);
                    if($cases) {
                        $tracking = [
                            'tracking' => 2,
                            'password' => $request->response
                        ];
                       DB::table('submitted_cases')
                       ->where('token', $token)
                       ->update($tracking);

                       DB::table('instructor_cases')
                       ->where('token', $token)
                       ->update(['tracking' => 2]);


                        Session()->flash('success', 'The case has been updated to Student');
                        return redirect()->back();
                    } else {
                        Session()->flash('fail', 'The case has been n0t forwarded to Student');
                        return redirect()->back();
                    }

                }

            }





    }
