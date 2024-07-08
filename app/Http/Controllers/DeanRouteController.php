<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use App\Models\AcCase;
use App\Models\ChairCase;
use App\Models\CollageCase;
use App\Models\DeanCase;
use App\Models\InstructorCase;
use App\Models\RegistralCase;
use App\Models\SubmittedCase;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Session;

class DeanRouteController extends Controller
{
    public function deanLogin()
    {
        $data = array();
        if(Session::has('sessionDean')) {
            $data = User::where('username', Session::get('sessionDean'))->first();
        }//  dd($data);

        return view('dean.dean-dashboard', compact('data'));
    }

    public function case()
    {
     //   $cases = DB::table('dean_cases')->latest()->first();
        $cases =  DeanCase::latest()->get();
        return view('dean.dean-view-case', [
            'cases' => $cases
        ]);
    }

    public function view($id)
    {
        $cases = DeanCase::findOrFail($id);
        $fileTypes = explode('.', $cases->file);
        $index = count($fileTypes);
        $fileTypes = $fileTypes[$index - 1];
        return view('dean.dean-view', [
            'cases' => $cases,
            'fileTypes' => $fileTypes
        ]);
    }

    public function response(Request $request, $token)
    {
        $request->validate([
            'response' => 'required',
            'forward' => 'required'
        ]);

        if($request->approved) {
            $cases = DeanCase::where('token', $token)->first();
            $submittedCase = SubmittedCase::where('token', $token)->first();
          // dd($cases);
            if($cases) {
                $tracking = [
                    'tracking' => 1,
                ];

                if($request->forward == "Registral") {
                    DB::table('dean_cases')
                    ->where('token', $token)
                    ->update($tracking);

                    DB::table('submitted_cases')
                    ->where('token', $token)
                    ->update($tracking);
                    $case = RegistralCase::where('token', $token)->first();

                    if($case) {
                        $update = [
                            'description' => $request->response,
                            'routedCaseHandler' => $request->forward
                        ];

                        DB::table('registral_cases')
                        ->where('token', $token)
                        ->update($update);

                        DB::table('submitted_cases')->where('token', $token)->update([
                            'caseHandler' => $submittedCase->caseHandler . ' ' . $request->forward
                        ]);

                        Session()->flash('success', 'The case has been updated to Registral');
                        return redirect()->back();
                    } else {
                        $registralCase = new RegistralCase();
                        $registralCase->fullname = $cases->fullname;
                        $registralCase->email = $cases->email;
                        $registralCase->role = $cases->role;
                        $registralCase->dept = $cases->dept;
                        $registralCase->year = $cases->year;
                        $registralCase->semister = $cases->semister;
                        $registralCase->caseHandler = $cases->caseHandler;
                        $registralCase->routedCaseHandler = $request->forward;

                        $registralCase->case = $cases->case;
                        $registralCase->file = $cases->file;
                        $registralCase->description =  $request->response;
                        $registralCase->rdescription = '';
                        $registralCase->session = $cases->session;
                        $registralCase->tracking = 0;
                        $registralCase->token = $token;
                        $registralCase->phone = $cases->phone;
                        $registralCase->gender = $cases->gender;
                        $registralCase->save();

                        DB::table('submitted_cases')->where('token', $token)->update([
                            'caseHandler' => $submittedCase->caseHandler . ' ' . $request->forward
                        ]);

                        Session()->flash('success', 'The case has been forwarded to Registral');
                        return redirect()->back();
                    }


                } elseif($request->forward == "Ac") {
                    $case = AcCase::where('token', $token)->first();

                    if($case) {
                        $update = [
                            'desc' => $request->response,
                            'routedCaseHandler' => $request->forward
                        ];

                        DB::table('ac_cases')
                        ->where('token', $token)
                        ->update($update);

                        Session()->flash('success', 'The case has been updated to Ac');
                        return redirect()->back();
                    } else {
                            $ac = new AcCase();
                            $ac->fullname = $cases->fullname;
                            $ac->email = $cases->email;
                            $ac->role = $cases->role;
                            $ac->dept = $cases->dept;
                            $ac->year = $cases->year;
                            $ac->semister = $cases->semister;
                            $ac->caseHandler = $cases->caseHandler;
                            $ac->routedCaseHandler = $request->forward;
                            $ac->case = $cases->case;
                            $ac->file = $cases->file;
                            $ac->description = $cases->description;
                            $ac->rdescription = '';
                            $ac->session = $cases->session;
                            $ac->tracking = 0;
                            $ac->phone = $cases->phone;
                            $ac->gender = $cases->gender;
                            $ac->save();

                            Session()->flash('success', 'The case has been forwarded to Ac');
                            return redirect()->back();
                    }
                } elseif($request->forward == "Collage") {
                    $case = CollageCase::where('token', $token)->first();
                    if($case) {

                        $update = [
                            'desc' => $request->response,
                            'routedCaseHandler' => $request->forward
                        ];

                        DB::table('collage_cases')->where('token', $token)->update($update);
                        Session()->flash('success', 'The case has been updated to Collage');
                        return redirect()->back();

                    } else {
                        $collageCase = new CollageCase();
                        $collageCase->fullname = $cases->fullname;
                        $collageCase->email = $cases->email;
                        $collageCase->username = $cases->username;
                        $collageCase->role = $cases->role;
                        $collageCase->dept = $cases->dept;
                        $collageCase->year = $cases->year;
                        $collageCase->semister = $cases->semister;
                        $collageCase->caseHandler = $cases->caseHandler;
                        $collageCase->routedCaseHandler = $request->forward;
                        $collageCase->case = $cases->case;
                        $collageCase->file = $cases->file;
                        $collageCase->description = $cases->description;
                        $collageCase->rdescription = '';
                        $collageCase->session = $cases->session;
                        $collageCase->tracking = 0;
                        $collageCase->token = $token;
                        $collageCase->phone = $cases->phone;
                        $collageCase->gender = $cases->gender;
                        $collageCase->save();

                        Session()->flash('success', 'The case has been forwarded to Collage');
                        return redirect()->back();
                    }

                } elseif($request->forward == "Chair") {

                    $case = ChairCase::where('token', $token)->first();
                    if($case) {

                        $update = [
                            'description' => $request->response,
                            'routedCaseHandler' => $request->forward
                        ];

                        DB::table('chair_cases')->where('token', $token)->update($update);
                        Session()->flash('success', 'The case has been updated to Chair');
                        return redirect()->back();

                    } else {
                        $chairCase = new ChairCase();
                        $chairCase->fullname = $cases->fullname;
                        $chairCase->email = $cases->email;
                        $chairCase->username = $cases->username;
                        $chairCase->role = $cases->role;
                        $chairCase->dept = $cases->dept;
                        $chairCase->year = $cases->year;
                        $chairCase->semister = $cases->semister;
                        $chairCase->caseHandler = $cases->caseHandler;
                        $chairCase->routedCaseHandler = $request->forward;
                        $chairCase->case = $cases->case;
                        $chairCase->file = $cases->file;
                        $chairCase->description = $cases->description;
                        $chairCase->rdescription = '';
                        $chairCase->session = $cases->session;
                        $chairCase->tracking = 0;
                        $chairCase->token = $token;
                        $chairCase->phone = $cases->phone;
                        $chairCase->gender = $cases->gender;
                        $chairCase->save();

                        Session()->flash('success', 'The case has been forwarded to Collage');
                        return redirect()->back();
                    }



                } elseif($request->forward == "Instructor") {

                  $cases = InstructorCase::where('token', $token)->first();
                   //dd($cases);
                    if($cases) {
                        $update = [
                            'tracking' => 1,
                            'rdescription' => $request->response
                        ];

                        DB::table('instructor_cases')
                        ->where('token', $token)
                        ->update($update);

                        Session()->flash('success', 'The case has been updated to Instuctor');
                        return redirect()->back();
                    } else {
                        $instructorCase = new InstructorCase();
                        $instructorCase->fullname = $cases->fullname;
                        $instructorCase->email = $cases->email;
                        $instructorCase->username = $cases->username;
                        $instructorCase->role = $cases->role;
                        $instructorCase->dept = $cases->dept;
                        $instructorCase->year = $cases->year;
                        $instructorCase->semister = $cases->semister;
                        $instructorCase->caseHandler = $cases->caseHandler;
                        $instructorCase->routedCaseHandler = $request->forward;
                        $instructorCase->case = $cases->case;
                        $instructorCase->file = $cases->file;
                        $instructorCase->description = $cases->description;
                        $instructorCase->rdescription = '';
                        $instructorCase->session = $cases->session;
                        $instructorCase->tracking = 0;
                        $instructorCase->token = $token;
                        $instructorCase->phone = $cases->phone;
                        $instructorCase->gender = $cases->gender;
                        $instructorCase->save();

                        Session()->flash('fail', 'The case has not been forwarded to Instuctor');
                        return redirect()->back();
                    }


                } elseif($request->forward == "Student") {
                    $cases = SubmittedCase::where('token', $token)->first();
                //    dd($cases);
                    if($cases) {
                        $tracking = [
                            'tracking' => 2,
                            'rdescription' => $request->response
                        ];
                       DB::table('submitted_cases')
                       ->where('token', $token)
                       ->update($tracking);

                       DB::table('submitted_cases')
                       ->where('token', $token)
                       ->update(['tracking' => 2]);

                        Session()->flash('success', 'The case has been updated to Studnet');
                        return redirect()->back();
                    } else {
                        Session()->flash('fail', 'The case has been n0t forwarded to Studnet');
                        return redirect()->back();
                    }

                }

            } else  {
                echo ';';
            }




        } elseif($request->reject) {
            $cases = DeanCase::where('token', $token)->first();
         //  dd($cases);
            if($cases) {
                $tracking = [
                    'tracking' => 1,
                ];

                DB::table('dean_cases')
                ->where('token', $token)
                ->update($tracking);

                DB::table('submitted_cases')
                ->where('token', $token)
                ->update($tracking);

                if($request->forward == "Registral") {


                } elseif($request->forward == "Ac") {


                } elseif($request->forward == "Chair") {

                } elseif($request->forward == "Insturctor") {

                } elseif($request->forward == "Student") {
                    $cases = SubmittedCase::where('token', $token)->first();
                //    dd($cases);
                    if($cases) {
                        $tracking = [
                            'tracking' => 3,
                            'response' => $request->response
                        ];
                       DB::table('submitted_cases')
                       ->where('token', $token)
                       ->update($tracking);

                        Session()->flash('success', 'The case has been forwarded to Studnet');
                        return redirect()->back();
                    } else {
                        Session()->flash('fail', 'The case has been n0t forwarded to Studnet');
                        return redirect()->back();
                    }

                }

            }


        }
    }

}
