<?php

namespace App\Http\Controllers;

use App\Models\CollageCase;
use App\Models\DeanCase;
use App\Models\RegistralCase;
use DB;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    public function logIn()
    {
        return view('collage.collage-dashboard');
    }
    public function case()
    {
        $cases = CollageCase::all();
        return view('collage.collage-view-case', [
            'cases' => $cases
        ]);
    }
    public function view($id)
    {
        $cases = CollageCase::where('id', $id)->first();
        $filetypes = explode('.', $cases->file);
        $index = count($filetypes);
        $filetypes = $filetypes[$index - 1];

        // dd($filetypes);


        return view('collage.collage-case', [
            'cases' => $cases,
            'fileTypes' => $filetypes,
        ]);
    }

    public function response(Request $request, $token)
    {
        $request->validate([
            'response' => 'required',
            'forward' => 'required'
        ]);

        if($request->approved) {

            $cases = CollageCase::where('token', $token)->first();

            if($cases) {

                $tracking = [
                    'tracking' => 1,

                ];

                $tracking0 = [
                    'description' => $request->response,
                ];

                $tracking1 = [
                    'tracking' => 2
                ];

                if($request->forward == "Registral") {

                    $case = RegistralCase::where('token', $token)->first();

                    if($case) {

                        DB::table('collage_cases')
                        ->where('token', $token)
                        ->update($tracking);

                        DB::table('registral_cases')
                        ->where('token', $token)
                        ->update($tracking0);

                        Session()->flash('success', 'The case has been updated to Registral');
                        return redirect()->back();

                    } else {

                    $registralCase = new RegistralCase();
                    $registralCase->fullname = $cases->fullname;
                    $registralCase->email = $cases->email;
                 //   $registralCase->username = $cases->username;
                    $registralCase->role = $cases->role;
                    $registralCase->dept = $cases->dept;
                    $registralCase->year = $cases->year;
                    $registralCase->semister = $cases->semister;
                    $registralCase->caseHandler = $cases->caseHandler;
                    $registralCase->routedCaseHandler = $request->forward;
                    $registralCase->case = $cases->case;
                    $registralCase->file = $cases->file;
                    $registralCase->description = $cases->description;
                    $registralCase->rdescription = $request->response;
                    $registralCase->session = $cases->session;
                    $registralCase->tracking = 0;
                    $registralCase->token = $token;
                    $registralCase->phone = $cases->phone;
                    $registralCase->gender = $cases->gender;

                    $registralCase->save();

                    Session()->flash('success', 'The case has been forwarded to Registral');
                    return redirect()->back();

                    }





                } elseif($request->forward == 'Dean') {
                    DB::table('collage_cases')
                    ->where('token', $token)
                    ->update($tracking0);

                    $case = DeanCase::where('token', $token)->first();

                    $rdescription = [
                        'rdescription' => $request->response
                    ];

                    DB::table('dean_cases')
                    ->where('token', $token)
                    ->update($rdescription);

                    Session()->flash('success', 'The case has been forwarded to Dean');
                    return redirect()->back();
                }
            } else {
                echo 'r';
            }
        }

    }
}
