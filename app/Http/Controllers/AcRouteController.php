<?php

namespace App\Http\Controllers;

use App\Models\AcCase;
use DB;
use Illuminate\Http\Request;

class AcRouteController extends Controller
{
    public function logIn() {
        return view('ac.ac-dashboard');
    }
    public function case() {
        $cases = AcCase::all();
        return view('ac.ac-view-case', [
            'cases' => $cases
        ]);
    }
    public function view($id) {
        $case = AcCase::where('id',$id)->first();
        $filetypes = explode('.',$case->file);
        $index = count($filetypes);
        dd($filetypes);

    }

    public function response(Request $request, $token) {
        $request->validate([
            'response' => 'required'
        ]);

        if($request->approved) {

            $cases = AcCase::where('token', $token)->get();
            if($cases) {
                    $tracking = [
                        'tracking' => 2,
                        'rdescription' => $request->response
                    ];
                /*    $passcode = [
                        'tracking' => 2,
                        'password' => $request->password
                    ];*/
                    DB::table('dean_cases')
                        ->where('token', $token)
                        ->update($tracking);

                    DB::table('ac_cases')
                        ->where('token', $token)
                        ->update($tracking);



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
