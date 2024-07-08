<?php

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{


    public function login(Request $request) {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);
        $auth = User::where('username', $request->username)->first();
        if($auth) {

//$request->password == $auth->password
            if(Hash::check($request->password, $auth->password) && $auth->username == $request->username) {
                if($auth->role == 'Student') {
                    $request->session()->put('sessionStudent', $auth->username);
                    return redirect('student/student-log');
                }  elseif($auth->role == 'Admin') {
                    $request->session()->put('sessionAdmin', $auth->username);
                    return redirect('admin/admin-log');
                } elseif($auth->role == 'Registral') {
                  $request->session()->put('sessionRegistral', $auth->username);
                  return redirect('registral/registral-log');
                } elseif($auth->role == 'Ac') {
                  $request->session()->put('sessionAc', $auth->username);
                  return redirect('ac/ac-log');
               } elseif($auth->role == 'Collage') {
                  $request->session()->put('sessionCollage', $auth->username);
                  return redirect('collage/collage-log');
               } elseif($auth->role == 'Dean') {
                    $request->session()->put('sessionDean', $auth->username);
                    return redirect('dean/dean-log');
                } elseif($auth->role == 'Chair') {
                    $request->session()->put('sessionChair', $auth->username);
                    return redirect('chairman/chairman-log');
                } elseif($auth->role == 'Secretery') {
                  $request->session()->put('sessionSecretery', $auth->username);
                  return redirect('secretery/secretery-log');
              }else {
                    $request->session()->put('sessionInstructor', $auth->username);
                    return redirect('instructor/instructor-log');
                }
            } else {
                session()->flash('authFail', 'User Credentials did not match');
                return redirect('/');
            }
        } else {
            session()->flash('authRegisterFirst', 'Register First');
            return redirect('/');
        }

    }






  /*  public function AuthLogin(Request $request) {

      //  dd($request);
             $request->validate([
                  'username' => 'required',
                  'password' => 'required|min:2|max:50'
              ]);



            // dd("auto");
              $auth = User::where('username', $request->username)->first();
            //dd($auth);
              if($auth) {
                  if($auth->username == $request->username && $auth->password == $request->password) {
                      if($auth->role == 'Student') {
                          $request->session()->put('sessionStudent', $auth->username);
                          return redirect('student/student-log');
                      }
                      elseif($auth->role == 'Admin') {
                          $request->session()->put('sessionAdmin', $auth->username);
                          return redirect('admin/admin-log');
                      }
                      elseif($auth->role == 'Registral') {
                        $request->session()->put('sessionRegistral', $auth->username);
                        return redirect('registral/registral-log');
                      }
                      elseif($auth->role == 'Ac') {
                        $request->session()->put('sessionAc', $auth->username);
                        return redirect('ac/ac-log');
                     }
                     elseif($auth->role == 'Collage') {
                        $request->session()->put('sessionCollage', $auth->username);
                        return redirect('collage/collage-log');
                     }
                      elseif($auth->role == 'Dean') {
                          $request->session()->put('sessionDean', $auth->username);
                          return redirect('dean/dean-log');
                      }
                       elseif($auth->role == 'Chair') {
                          $request->session()->put('sessionChair', $auth->username);
                          return redirect('chairman/chairman-log');
                      }
                      elseif($auth->role == 'Secretery') {
                        $request->session()->put('sessionSecretery', $auth->username);
                        return redirect('secretery/secretery-log');
                    }
                       else {
                          $request->session()->put('sessionInstructor', $auth->username);
                          return redirect('instructor/instructor-log');
                      }
                  } else {
                      session()->flash('authFail', 'User Credentials did not match');
                      return redirect('/');
                  }
              } else {
                  session()->flash('authRegisterFirst', 'Register First');
                  return redirect('/');
              }


          }

          public function a(Request $request) {

        //    dd($request);
            $request->validate([
                'username' => 'required',
                'password' => 'required|min:2|max:50'
            ]);



          // dd("auto");
            $auth = User::where('username', $request->username)->first();
          //dd($auth);
            if($auth) {
                if($auth->username == $request->username && $auth->password == $request->password) {
                    if($auth->role == 'Student') {


                        $request->Session()->put('sessionstudent', $auth->username);
                        return redirect('student/student-log');
                    }
                    elseif($auth->role == 'Admin') {
                        $request->Session()->put('sessionAdmin', $auth->username);
                        return redirect('admin/admin-log');
                    }
                    elseif($auth->role == 'Registral') {
                      $request->session()->put('sessionRegistral', $auth->username);
                      return redirect('registral/registral-log');
                    }
                    elseif($auth->role == 'Ac') {
                      $request->session()->put('sessionAc', $auth->username);
                      return redirect('ac/ac-log');
                   }
                   elseif($auth->role == 'Collage') {
                      $request->session()->put('sessionCollage', $auth->username);
                      return redirect('collage/collage-log');
                   }
                    elseif($auth->role == 'Dean') {
                        $request->session()->put('sessionDean', $auth->username);
                        return redirect('dean/dean-log');
                    }
                     elseif($auth->role == 'Chair') {
                        $request->session()->put('sessionChair', $auth->username);
                        return redirect('chairman/chairman-log');
                    }
                    elseif($auth->role == 'Secretery') {
                      $request->session()->put('sessionSecretery', $auth->username);
                      return redirect('secretery/secretery-log');
                  }
                     else {
                        $request->session()->put('sessionInstructor', $auth->username);
                        return redirect('instructor/instructor-log');
                    }
                } else {
                    session()->flash('authFail', 'User Credentials did not match');
                    return redirect('/');
                }
            } else {
                session()->flash('authRegisterFirst', 'Register First');
                return redirect('/');
            }
          }

*/
}



  /*   $request->validate([
              'username' => 'required',
              'password' => 'required'
           ]);
           $a = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
           print_r($request->username, $request->password);
            if(Auth::attempt(['username' => $request->username, 'password' => $request->password])) {

                  if(Auth::user()->role == 'Admin') {
                      return redirect('admin-index');
                  } else if(Auth::user()->role == 'Chair') {
                      return redirect('chairman-log');
                  }  else if(Auth::user()->role == 'Instructor') {
                      return redirect('instructor-log');
                  } else if(Auth::user()->role == 'Secretery') {
                      return redirect('secretery-log');
                  } else if(Auth::user()->role == 'Student') {
                      return redirect('student-log');
                  }

              } else {
                  return redirect()->back()->with('errorLogin', 'incorrect credentials');
              }

      */
