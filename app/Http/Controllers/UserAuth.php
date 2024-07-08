<?php

namespace App\Http\Controllers;
use App\Models\SmisStudent;
use App\Models\User;
use App\Models\Student;
use App\Models\Dean;
use App\Models\Chair;
use App\Models\Instructor;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Login;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Mail;
use App\Mail\EmailVerification;
use Auth;

class UserAuth extends Controller
{

    //////  Student account
    public function registerStudent(Request $request) {

      $new = $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'role' => 'required',
            'gender' => 'required',
            'contact' => 'required',
            'email' => 'required|unique:students',
            'username' => 'required|unique:students',
            'password' => 'required|min:5|max:100'
        ]);
        $role = $new['role'];

        if($role == 'Student') {
              $user = new Student();
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = $request->password;
        $res = $user->save();

            if($res) {
                return back()->with('success', "Stundent Account Created :) ");
            } else {
                return back()->with('fail',"Failed To Create Student Account :( ");
            }
        } else {
            return redirect('student-user');
        }



    }

    //  Chairman Account

    public function registerChair(Request $request) {

        $request->validate([
              'fname' => 'required',
              'mname' => 'required',
              'lname' => 'required',
              'role' => 'required',
              'gender' => 'required',
              'contact' => 'required',
              'email' => 'required|unique:students',
              'username' => 'required|unique:students',
              'password' => 'required|min:5|max:100'
          ]);

          $user = new Chair();
          $user->fname = $request->fname;
          $user->mname = $request->mname;
          $user->lname = $request->lname;
          $user->role = $request->role;
          $user->gender = $request->gender;
          $user->contact = $request->contact;
          $user->email = $request->email;
          $user->username = $request->username;
          $user->password = $request->password;
          $res = $user->save();

          if($res) {
            return back()->with('success', "Chair Account Created :) ");
        } else {
            return back()->with('fail',"Failed To Create Chair Account :( ");
        }
      }

      // Dean account
      public function registerDean(Request $request) {

        $request->validate([
              'fname' => 'required',
              'mname' => 'required',
              'lname' => 'required',
              'role' => 'required',
              'gender' => 'required',
              'contact' => 'required',
              'email' => 'required|unique:students',
              'username' => 'required|unique:students',
              'password' => 'required|min:5|max:100'
          ]);

          $user = new Dean();
          $user->fname = $request->fname;
          $user->mname = $request->mname;
          $user->lname = $request->lname;
          $user->role = $request->role;
          $user->gender = $request->gender;
          $user->contact = $request->contact;
          $user->email = $request->email;
          $user->username = $request->username;
          $user->password = $request->password;
          $res = $user->save();

          if($res) {
            return back()->with('success', "Dean Account Created :) ");
        } else {
            return back()->with('fail',"Failed To Create Dean Account :( ");
        }
      }
      //  Instructor accoutn

      public function registerInstructor(Request $request) {

        $request->validate([
              'fname' => 'required',
              'mname' => 'required',
              'lname' => 'required',
              'role' => 'required',
              'gender' => 'required',
              'contact' => 'required',
              'email' => 'required|unique:students',
              'username' => 'required|unique:students',
              'password' => 'required|min:5|max:100'
          ]);
          $user = new Instructor();
          $user->fname = $request->fname;
          $user->mname = $request->mname;
          $user->lname = $request->lname;
          $user->role = $request->role;
          $user->gender = $request->gender;
          $user->contact = $request->contact;
          $user->email = $request->email;
          $user->username = $request->username;
          $user->password = $request->password;

          $res = $user->save();

          if($res) {
            return back()->with('success', "Insructor Account Created :) ");
        } else {
            return back()->with('fail',"Failed To Create Instructor Account :( ");
        }
      }

    public function add() {
        return view('admin.reg');
    }

    public function forgetPassword() {
        return view('auth.password.forget');
    }


    public function register() {
        return view('auth.registration.registration');
    }

    public function stundentSave(Request $request) {
        $request->validate([
            'username' => 'required|unique:students',
            'password' => 'required',

            'confirm_password' => 'required',
        ]);
        $user = new Student();
        $check = SmisStudent::where('username', $request->username)->first();
        if($check) {

            if($request->password == $request->confirm_password) {
                $user->username = $check->username;
                $user->email = $check->email;
                $user->password = Hash::make($request->password);
                $user->Fname = $check->Fname;
                $user->Mname = $check->Mname;
                $user->Lname = $check->Lname;
                $user->role = $check->role;
                $user->contact = $check->contact;
                $user->gender = $check->gender;
                $user->dept = $check->dept;
                $user->year = $check->year;
                $user->semister = $check->semister;
                $user->status = 0;
                $user->save();

                $login = new User();
                $login->username = $check->username;
                $login->password = Hash::make($request->password);
                $login->role = $check->role;
                $login->token = Str::length(32);
                $login->status = 0;
                $login->save();

                session()->flash('success', 'You have registerd');
                 return redirect('register');

            } else {

                session()->flash('password', 'Password did not match');
                return redirect('register');
            }
        } else {

               session()->flash('fail', 'You are not student');
               return redirect('register');
        }

    }




    public function checkEmailOrUsername(Request $request) {
        $request->validate([
            'username' => 'required'
        ]);

        $checkUsername = Student::where('username', $request->username)->first();
        if($checkUsername) {
            return view('auth.password.checkUsername', [
                'checkUsername' => $checkUsername
            ]);
        } else {
            session()->flash('notFound', 'Username not found');
            return redirect('forgotPassword');
        }
       // return view('auth.password.checkUsername')->with('checkUsername', $checkUsername->username);
    }


    public function checkEmail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:students'
        ]);


       $mail_data = [
        'recipient' => 'asratzewo@gmail.com',
        'fromEmail' => 'Asratfox05@gmail.com',
        'fromName' => 'Asrat',
        'subject' => 'x',
        'body' => 'body'
       ];

       Mail::to($request->email)->send(new EmailVerification());

    /*   Mail::send('auth.password.restPasswordLink',$mail_data, function($messages) use ($mail_data) {
        $messages->to($mail_data['recipient'])
                ->from($mail_data['fromEmail'], $mail_data['fromName'])
                ->subject($mail_data['subject']);
       });*/

       return redirect()->back()->with('success', 'Email sent');
    }
}
