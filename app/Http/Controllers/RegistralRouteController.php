<?php

namespace App\Http\Controllers;

use App\Models\RegistralCase;
use App\Models\SubmittedCase;
use DB;
use Illuminate\Http\Request;

class RegistralRouteController extends Controller
{
     public function logIn() {
        return view('registral.registral-dashboard');
    }
    public function case() {
        $cases = RegistralCase::latest()->get();
        return view('registral.registral-view-case', [
            'cases' => $cases
        ]);
    }
    public function view($id) {
        $case = RegistralCase::where('id',$id)->first();
        $filetypes = explode('.',$case->file);
        $index = count($filetypes);
        $filetypes = $filetypes[$index - 1];

       // dd($filetypes);


        return view('registral.registral-case', [
            'case' => $case,
            'fileTypes' => $filetypes,

        ]);
    }

    public function response(Request $request, $token) {
        $request->validate([
            'response' => 'required'
        ]);

        if($request->approved) {

            $cases = RegistralCase::where('token', $token)->first();
            $submittedCase = SubmittedCase::where('token', $token)->first();
            if($cases) {
                    $tracking = [
                        'tracking' => 2,
                    ];

                    $response = [
                       'tracking' => 2,
                        'rdescription' => $request->response
                    ];
                    DB::table('registral_cases')
                        ->where('token', $token)
                        ->update($tracking);

                    if($request->forward == 'Collage') {
                        DB::table('collage_cases')
                        ->where('token', $token)
                        ->update($response);
                    }
                    elseif($request->forward == 'Ac') {
                        DB::table('ac_cases')
                        ->where('token', $token)
                        ->update($response);
                    }
                    elseif($request->forward == 'Dean') {
                        DB::table('dean_cases')
                        ->where('token', $token)
                        ->update($response);

                        DB::table('submitted_cases')->where('token', $token)->update([
                            'caseHandler' => $submittedCase->caseHandler . ' ' . $request->forward
                        ]);
                    }







                        session()->flash('responseCompelete', 'Case has been Updated');

                        return redirect()->back();


            } else {
                echo 'data has not been found';
            }
        } else {
            echo 'r';
        }
    }

}
