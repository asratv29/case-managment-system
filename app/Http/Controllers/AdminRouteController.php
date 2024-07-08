<?php

namespace App\Http\Controllers;

use App\Models\Ac;
use App\Models\Admin;
use App\Models\Chair;
use App\Models\Dean;
use App\Models\Instructor;
use App\Models\Registral;
use App\Models\Secretery;
use App\Models\SecreteryUser;
use App\Models\Student;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Hash;
use Session;
use Str;

class AdminRouteController extends Controller
{
    public function adminDashBoard()
    {
        $admin = Admin::count();
        $reg = Registral::count();
        $den = Dean::count();
        $Chair = Chair::count();
        $inst = Instructor::count();
        $sec = SecreteryUser::count();
        $stud = Student::count();
        $all = $admin + $reg + $den + $Chair + $inst + $sec + $stud;
        $data = array();
        if(Session::has('sessionAdmin')) {
            $data = User::where('username', Session::get('sessionAdmin'))->first();
        }
        return view('admin.admin-dashboard', compact('data', 'all', 'reg', 'sec', 'den', 'Chair', 'inst', 'stud'));
    }

    public function registral()
    {
        $users = Registral::all();
        return view('admin.admin-registral', [
            'users' => $users
        ]);
    }
    public function admin()
    {
        $users = DB::table('admins')->get();
        return view('admin.admin-admin', [
            'users' => $users
        ]);
    }
    public function ac()
    {
        $users = Ac::all();
        return view('admin.admin-ac', [
            'users' => $users
        ]);
    }

    public function dean()
    {
        $users = Dean::all();
        return view('admin.dean', [
            'users' => $users
        ]);
    }

    public function chair()
    {
        $users = Chair::all();
        return view('admin.chair', [
            'users' => $users
        ]);
    }

    public function instructor()
    {
        $users = Instructor::all();
        return view('admin.instructor', [
            'users' => $users
        ]);
    }

    public function secretery()
    {
        $users = SecreteryUser::all();
        return view('admin.secretery', [
            'users' => $users
        ]);
    }

    public function student()
    {
        $users = Student::latest()->get();
        return view('admin.student', [
           'users' => $users
        ]);
    }

    public function disableAccount($id) {
        $find = Student::find($id);

        $find->status = 0;
        $find->save();

        return redirect()->back()->with('success', 'Student account has been disabled');

    }

    public function enableAccount($id) {
        $find = Student::find($id);

        $find->status = 1;
        $find->save();

        return redirect()->back()->with('success', 'Student account has been enabled');

    }

    public function updateUsers(Request $request, $id) {
        $user = $request->all();
       // dd($user['role']);
       if($user['password'] == $user['cpassword']) {
            if($user['role'] == 'Registral' || $user['role'] == 'registral') {
                    $find = Registral::find($id);
               DB::table('registrals')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' => Hash::make($request->password),
                    'status' => $request->status
                ]);

                 if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'registral user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'registral user has been created');
                }
            }

            if($user['role'] == 'Admin' || $user['role'] == 'admin') {
                $find = Admin::find($id);
            DB::table('admins')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' => Hash::make($request->password),
                    'status' => $request->status
                ]);

                     if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'Admin user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'Admin user has been created');
                }

             }

            if($user['role'] == 'Dean' || $user['role'] == 'dean') {
                $find = Dean::find($id);

            DB::table('deans')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' =>Hash::make($request->password),
                    'status' => $request->status
                ]);

             if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'Dean user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'Dean user has been created');
                }

             }

             if($user['role'] == 'Chair' || $user['role'] == 'chair') {
                $find = Chair::find($id);

            DB::table('chairs')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' => Hash::make($request->password),
                    'status' => $request->status
                ]);

                if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'Chair user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'Chair user has been created');
                }

             }

             if($user['role'] == 'Instructor' || $user['role'] == 'instructor') {
                $find = Instructor::find($id);

                DB::table('instructors')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' => Hash::make($request->password),
                    'status' => $request->status
                ]);

                 if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'Instructor user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'Instructor user has been created');
                }

             }

             if($user['role'] == 'Secretery' || $user['role'] == 'secretery') {
                $find = SecreteryUser::find($id);
              //  dd($find->username);
                  DB::table('secretery_users')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' => Hash::make($request->password),
                    'status' => $request->status
                ]);

                if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'secretery user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'secretery user has been created');
                }


             }
             if($user['role'] == 'Student' || $user['role'] == 'student') {
                $find = Student::find($id);
               // dd($find->username);

            DB::table('students')->where('id', $id)->update([
                    'contact' => $request->contact,
                    'password' => Hash::make($request->password),
                    'status' => $request->status
                ]);

                               if(User::where('username', $find->username)->first()) {
                    DB::table('users')->where('username', $find->username)->update([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status
                    ]);
                    return redirect()->back()->with('success', 'secretery user has been updated');
                } else {
                    DB::table('users')->insert([
                        'username' => $find->username,
                        'password' => Hash::make($request->password),
                        'status' => $request->status,
                        'token' => Str::length(32),
                        'role' => $request->role
                    ]);
                    return redirect()->back()->with('success', 'secretery user has been created');
                }
             }

         } else {
            return redirect()->back()->with('fail', 'password didnot match');
         }

    }



        public function storeRegistral(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:registrals',
            'username' => 'required|unique:registrals',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);

                $dean = new Registral();
                $userlog = new User();
                $token = Str::random(32);
                $passcode = Hash::make($request->password);
            //    dd(Hash::check($request->password, $passcode));

                $dean->Fname = $request->fname;
                $dean->Mname = $request->mname;
                $dean->Lname = $request->lname;

                $dean->username = $request->username;
                $dean->email = $request->email;

                $dean->password = $passcode;

                $dean->role = $request->role;
                $dean->contact = $request->contact;
                $dean->gender = $request->gender;
                $dean->status = 0;
                $dean->save();

                $userlog->username = $request->username;
                $userlog->password = $passcode;
                $userlog->role = $request->role;
                $userlog->status = 0;

                $a = $userlog->save();

                if($a) {
                    Session()->flash('success', 'Registral has been registerd!');
                     return redirect()->back();
                } else {
                    Session()->flash('fail', 'Registral has not been registerd!');
                     return redirect()->back();
                }


        }

        public function updateRegistral($id) {
            $user = Registral::find($id);
            return view('admin.update-user', [
                'user' => $user
            ]);
        }

        public function deleteRegistral($id) {
            $find = Registral::find($id);
            $find->delete();
            return redirect()->back()->with('success', 'Registral has been deleted');
        }




    public function storeAdmin(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:admins',
            'username' => 'required|unique:admins',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);



            if($request->password == $request->cpassword) {

                $dean = new Admin();
                $userlog = new User();
                $token = Str::random(32);

                $dean->Fname = $request->fname;
                $dean->Mname = $request->mname;
                $dean->Lname = $request->lname;

                $dean->username = $request->username;
                $dean->email = $request->email;

                $dean->password = Hash::make($request->password);

                $dean->role = $request->role;
                $dean->contact = $request->contact;
                $dean->gender = $request->gender;
                $dean->status = 0;
                $dean->save();

                $userlog->username = $request->username;
                $userlog->password = Hash::make($request->password);
                $userlog->role = $request->role;
                $userlog->status = 0;

                $a = $userlog->save();
                if($a) {
                    Session()->flash('success', 'Admin has been registerd!');
                     return redirect()->back();
                } else {
                    Session()->flash('fail', 'Admin has been registerd!');
                return redirect()->back();
                }

            } else {
                Session()->flash('fail', 'password and cpassword is not equal!');
                return redirect()->back();
            }
        }

        public function updateAdmin($id) {
            $user = Admin::find($id);

            return view('admin.update-user', [
                'user' => $user
            ]);
        }

        public function deleteAdmin($id) {
            $find = Admin::find($id);
            $find->delete();

            return redirect()->back()->with('success', 'Admin has been deleted');
        }


    public function storeDean(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);


            if($request->password == $request->cpassword) {
                $dean = new Dean();
                $userlog = new User();
                $token = Str::random(32);

                $dean->Fname = $request->fname;
                $dean->Mname = $request->mname;
                $dean->Lname = $request->lname;

                $dean->username = $request->username;
                $dean->email = $request->email;

                $dean->password = Hash::make($request->password);

                $dean->role = $request->role;
                $dean->contact = $request->contact;
                $dean->gender = $request->gender;
                $dean->status = 0;
                $dean->save();

                $userlog->username = $request->username;
                $userlog->password = Hash::make($request->password);
                $userlog->role = $request->role;
                $userlog->status = 0;

               $a = $userlog->save();
                if($a) {
                    Session()->flash('success', 'Dean has been registerd!');
                    return redirect()->back();
                } else {
                    Session()->flash('fail', 'Dean has not been registerd!');
                    return redirect()->back();
                }

            } else {
                Session()->flash('fail', 'password and cpassword is not equal!');
                return redirect()->back();
            }



    }

    public function updateDean($id) {
        $user = Dean::find($id);

        return view('admin.update-user', [
            'user' => $user
        ]);
    }

    public function deleteDean($id) {
        $find = Dean::find($id);
        $find->delete();

        return redirect()->back()->with('success', 'user Deleted');
    }




    public function storeStudent(Request $request)
    {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required',
            'username' => 'required',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);

            if($request->password == $request->cpassword) {
                $dean = new Student();
                $userlog = new User();
                $token = Str::random(32);

                $dean->Fname = $request->fname;
                $dean->Mname = $request->mname;
                $dean->Lname = $request->lname;

                $dean->username = $request->username;
                $dean->email = $request->email;

                $dean->password = Hash::make($request->password);

                $dean->role = $request->role;
                $dean->contact = $request->contact;
                $dean->gender = $request->gender;
                $dean->status = 0;
                $dean->save();

                $userlog->username = $request->username;
                $userlog->password = Hash::make($request->password);
                $userlog->role = $request->role;
                $userlog->status = 0;

                $userlog->save();

                Session()->flash('success', 'Student has been registerd!');
                return redirect()->back();
            } else {
                Session()->flash('fail', 'password and cpassword is not equal!');
                return redirect()->back();
            }



    }

    public function updateStudent($id) {
        $user = Student::find($id);

        return view('admin.update-user', [
            'user' => $user
        ]);
    }

    public function storeChair(Request $request) {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:chairs',
            'username' => 'required|unique:chairs',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);

        if($request->password == $request->cpassword) {
            $user = new Chair();
            $userLog = new User();
            $passcode = Hash::make($request->password);

            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $passcode;

            $user->Fname = $request->fname;
            $user->Mname = $request->lname;
            $user->Lname = $request->lname;

            $user->role = $request->role;
            $user->contact = $request->contact;
            $user->status = 0;
            $user->gender = $request->gender;
            $user->save();

            $userLog->username = $request->username;
            $userLog->password = $passcode;
            $userLog->role = $request->role;
            $userLog->token = '';
            $userLog->status = 0;

            $a = $userLog->save();

            if($a) {
                return redirect()->back()->with('success', 'Chair has been registerd');
            } else {
                return redirect()->back()->with('fail', 'Chair has not been registerd');

            }
        }
    }

    public function updateChair($id) {
        $user = Chair::find($id);

        return view('admin.update-user', [
            'user' => $user
        ]);
    }

    public function deleteChair($id) {
        $find = Chair::find($id);

        $find->delete();

        return redirect()->back()->with('success', 'Chair has been deleted');
    }


    public function storeInstructor(Request $request) {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'chairid' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:Instructors',
            'username' => 'required|unique:Instructors',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);
      //  dd('here');
        if($request->password == $request->cpassword) {
            $user = new Instructor();
            $userLog = new User();
            $passcode = Hash::make($request->password);

            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $passcode;

            $user->Fname = $request->fname;
            $user->Mname = $request->lname;
            $user->Lname = $request->lname;
            $user->chair_id = $request->chairid;

            $user->role = $request->role;
            $user->contact = $request->contact;
            $user->status = 0;
            $user->gender = $request->gender;
            $user->save();

            $userLog->username = $request->username;
            $userLog->password = $passcode;
            $userLog->role = $request->role;
            $userLog->token = '';
            $userLog->status = 0;

            $a = $userLog->save();

            if($a) {
                return redirect()->back()->with('success', 'Instructor has been registerd');
            } else {
                return redirect()->back()->with('fail', 'Instructor has not been registerd');

            }
        } else {
            return redirect()->back()->with('fail', 'Password didnot match');
        }

    }
    public function updateInstructor($id) {
        $user = Instructor::find($id);

        return view('admin.update-user', [
            'user' => $user
        ]);
    }
    public function deleteInstructor($id) {
        $find = Instructor::find($id);

        $find->delete();

        return redirect()->back()->with('success', 'Instructor has been deleted');
    }



    public function storeSecretery(Request $request) {
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:secretery_users',
            'username' => 'required|unique:secretery_users',
            'password' => 'required|min:5|max:100',
            'cpassword' => 'required|min:5|max:100',
        ]);
        if($request->password == $request->cpassword) {
            $user = new SecreteryUser();
            $userLog = new User();
            $passcode = Hash::make($request->password);

            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $passcode;

            $user->Fname = $request->fname;
            $user->Mname = $request->lname;
            $user->Lname = $request->lname;

            $user->role = $request->role;
            $user->contact = $request->contact;
            $user->status = 0;
            $user->gender = $request->gender;
            $user->save();

            $userLog->username = $request->username;
            $userLog->password = $passcode;
            $userLog->role = $request->role;
            $userLog->token = '';
            $userLog->status = 0;

            $a = $userLog->save();

            if($a) {
                return redirect()->back()->with('success', 'Secretery has been registerd');
            } else {
                return redirect()->back()->with('fail', 'Secretery has not been registerd');

            }
        }

    }
    public function updateSecretery($id) {
        $user = SecreteryUser::find($id);

        return view('admin.update-user', [
            'user' => $user
        ]);
    }
    public function deleteSecretery($id) {
        $find = SecreteryUser::find($id);

        $find->delete();

        return redirect()->back()->with('success', 'Secretery has been deleted');
    }



}
