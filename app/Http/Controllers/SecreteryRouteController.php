<?php

namespace App\Http\Controllers;

use App\Models\Secretery;
use App\Models\SmisStudent;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Session;

class SecreteryRouteController extends Controller
{
    public function secreteryLogin() {
        $data = array();
        if(Session::has('sessionSecretery')) {
            $data = User::where('username', Session::get('sessionSecretery'))->first();
        }
        $cases = Secretery::count();
        $pending = Secretery::where('tracking', 0)->count();
        $compeleted = Secretery::where('tracking', 2)->count();
        return view('secretery.secretery-dashboard', compact('cases', 'pending', 'compeleted', 'data'));
    }

    public function viewCase() {
        $cases = Secretery::all();
        return view('secretery.secrerery-case', ['cases' => $cases]);
    }

    public function reset($token) {
        $case = Secretery::where('token', $token)->first();
        return view('secretery.secretery-view-case')->with('case', $case);
    }

    public function resetPasswordPost(Request $request, $token) {
        $request->validate([

            'username' => 'required',
            'password' => 'required|min:8|max:50',
            'confirm_password' => 'required|min:8|max:50'
        ]);


        if($request->password == $request->confirm_password) {


            $data = [
                'password' => $request->password
            ];

            $check = SmisStudent::where('username', $request->username)->first();

           // dd($request->username);
         //    dd($resetPassword . "  ". $request->username. '   ' . $check);
            if($check) {
                $update = DB::table('smis_students')
                        ->where('username', $request->username)
                        ->update($data);
       //             dd($update);
                        if($update) {
                            $tracking = [
                                'tracking' => 2,
                            ];
                            $passcode = [
                                'tracking' => 2,
                                'response' => $request->password
                            ];
                           DB::table('submitted_cases')
                                ->where('token', $token)
                                ->update($passcode);

                             DB::table('secreteries')
                                ->where('token', $token)
                                ->update($tracking);
                    //        dd($b . '    '. $d);
                                session()->flash('resetCompelete', 'Password has been Updated');

                                return redirect()->back();
                        }

                        session()->flash('resetCompelete', 'Password has not been  Updated');

                        return redirect()->back();

            } else {
                session()->flash('resetFaild', 'Student not found');

                 return redirect()->back();
            }

        } else {
            session()->flash('passwordidnotmach', 'Match the password');

            return redirect()->back();
        }
    }
}
