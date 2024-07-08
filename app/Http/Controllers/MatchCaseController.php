<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CHead;
use App\Models\Instructor;
use App\Models\SmisStudent;
use Illuminate\Http\Request;

use App\Models\Category;

use App\Models\ChairCase;
use App\Models\DeanCase;
use App\Models\InstructorCase;
use App\Models\Secretery;

use App\Models\SubmittedCase;

use Session;
use Str;
use function Rap2hpoutre\RemoveStopWords\remove_stop_words;
use Illuminate\Support\Facades\DB;

use Skyeng\Lemmatizer;
use Skyeng\Lemma;


// Require Composer's autoloader
//require_once __DIR__ . "/vendor/autoload.php";

class MatchCaseController extends Controller
{

    public function submitCasePost(Request $request) {


    $request->validate([
        'studentCase' => 'required',
        'file' => ['file','mimes:jpeg,jpg,png,tiff,bmp,pdf','max:25600']
    ]);

    //////// Query

    $userCase = remove_stop_words(strtolower($request->studentCase));
    $keywordsDB = DB::table('categories')->pluck('Keyword');

    $userCase = trim($userCase);
    $keywords = explode(' ', $userCase);
    $like = null;

    foreach($keywords as $keyword) {
      if($keyword == '') {
          continue;
      }
      foreach($keywordsDB as $keywordDB) {
          if($keyword == $keywordDB) {
              $like = $keyword;
              break;
          }
      }
    }

    $caseRow = Category::where('Keyword', 'LIKE', '%'.$like.'%')->get();
   // dd($like);
    $caseHandler = null;

    foreach($caseRow as $case) {
        $caseHandler = $case->CEmp;
    }
    ///////  End Query

    //////// file
    $file = '';
    $fileName = '';
    $desc = '';



    if($request->instructor) {
        $caseHandlerr = $request->instructor;
    }
    if($request->desc) {
        $desc = $request->desc;
    }
    if($request->file) {
        $file = $request->file;
        $fileName = $file->getClientOriginalName();
        $request->file->move('asset/file', $fileName);
    }
   // $fileName = time() . '.' . $file->getClientOriginalExtension();
  //  $request->file->move('asset/file', $fileName);
   // $fileName = time() . '.' .$request->session . '.' .$request->file->extension();
   //$filename = explode('.', $fileName);
   // dd($filename[1]);
    //$request->file->storeAs('files', $fileName);
            if($caseHandler == 'Dean') {

                $deanCase = new DeanCase();
                $submitted_case = new SubmittedCase();

                $smis = SmisStudent::where('username', $request->session)->first();
                $token = Str::random(32);
               // dd($smis);

                $deanCase->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $deanCase->email = $smis->email;
                $deanCase->username = $smis->username;
                $deanCase->role = $smis->role;
                $deanCase->dept = $smis->dept;
                $deanCase->year = $smis->year;
                $deanCase->semister = $smis->semister;
                $deanCase->caseHandler = $caseHandler;
                $deanCase->routedCaseHandler = '';
                $deanCase->case = $request->studentCase;
                $deanCase->file = $fileName;
                $deanCase->description = $desc;
                $deanCase->rdescription = '';
                $deanCase->session = $request->session;
                $deanCase->tracking = 0;
                $deanCase->token = $token;
                $deanCase->phone = $smis->contact;
                $deanCase->gender = $smis->gender;
                $deanCase->save();

                $submitted_case->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $submitted_case->email = $smis->email;
                $submitted_case->username = $smis->username;
                $submitted_case->response = '';
                $submitted_case->dept = $smis->dept;
                $submitted_case->year = $smis->year;
                $submitted_case->semister = $smis->semister;
                $submitted_case->phone = $smis->contact;
                $submitted_case->gender = $smis->gender;

                $submitted_case->token = $token;
                $submitted_case->caseHandler = $caseHandler;
                $submitted_case->case = $request->studentCase;
                $submitted_case->description = $desc;
                $submitted_case->rdescription = '';

                $submitted_case->file = $fileName;
                $submitted_case->session = $request->session;
                $submitted_case->tracking = 0;

                $submitted_case->save();


                Session()->flash('successCaseSubmission', 'Your case has been submitted dean');
               return redirect()->back();

            } else if($caseHandler == 'Chair') {

                $caseHandlerr = '';
                $instructor = '';

                if(!empty($_POST['chair'])) {

                    $caseHandlerr =  $_POST['chair'];


                } else if(empty($_POST['chair']) && empty($_POST['instructor'])) {
                    Session()->flash('required', 'Instructor is required');
                    return redirect()->back();
                }


                else if(!empty($_POST['instructor'])) {

                    $comparison = new \Atomescrochus\StringSimilarities\Compare();
                    $instructorDB = DB::table('instructors')->pluck('Fname');

                    $lev = array();
                    foreach($instructorDB as $instructor) {
                        $levenshtein = $comparison->levenshtein($request->instructor, $instructor);
                        $lev = $lev + array($instructor => $levenshtein);
                    }
                    asort($lev);

                    foreach($lev as $l => $v) {
                        $instructor = $l;
                        break;

                    }

                    $getInstructorData = Instructor::where('Fname', $instructor)->first();
                    $ch = CHead::where('id', $getInstructorData->chair_id)->first();

                    $caseHandlerr = $ch->course;
                }



//dd(empty($_POST['chair']));

                $chairCase = new ChairCase();
                $submitted_case = new SubmittedCase();

                $smis = SmisStudent::where('username', $request->session)->first();
                $token = Str::random(32);

                $chairCase->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $chairCase->email = $smis->email;
                $chairCase->username = $smis->username;
                $chairCase->role = $smis->role;

                $chairCase->dept = $smis->dept;
                $chairCase->year = $smis->year;
                $chairCase->semister = $smis->semister;

                $chairCase->caseHandler = $caseHandlerr;
                $chairCase->routedCaseHandler = '';

                $chairCase->case = $request->studentCase;
                $chairCase->file = $fileName;
                $chairCase->description = $desc;
                $chairCase->rdescription = '';
                $chairCase->session = $request->session;
                $chairCase->tracking = 0;
                $chairCase->token = $token;
                $chairCase->phone = $smis->contact;
                $chairCase->gender = $smis->gender;
                $chairCase->save();

                $submitted_case->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $submitted_case->email = $smis->email;
                $submitted_case->username = $smis->username;

                $submitted_case->dept = $smis->dept;
                $submitted_case->year = $smis->year;
                $submitted_case->semister = $smis->semister;

                $submitted_case->phone = $smis->contact;
                $submitted_case->gender = $smis->gender;
                $submitted_case->description = $desc;
                $submitted_case->rdescription = '';
                $submitted_case->response = '';
                $submitted_case->token = $token;
                $submitted_case->caseHandler = $caseHandlerr;
                $submitted_case->case = $request->studentCase;
                $submitted_case->file = $fileName;
                $submitted_case->session = $request->session;
                $submitted_case->tracking = 0;

                $submitted_case->save();


                Session()->flash('successCaseSubmission', 'Your case has been registerd to Chair');
                return redirect()->back();

            }  else if($caseHandler == 'Instructor') {


                $comparison = new \Atomescrochus\StringSimilarities\Compare();
                $instructorDB = DB::table('instructors')->pluck('Fname');
                $instructor = null;
                $lev = array();
                foreach($instructorDB as $instructor) {
                    $levenshtein = $comparison->levenshtein($request->instructor, $instructor);
                    $lev = $lev + array($instructor => $levenshtein);
                }
                asort($lev);

                foreach($lev as $l => $v) {
                    $instructor = $l;
                    break;
                }

              //  dd($instructor);

                $getInstructorData = Instructor::where('Fname', $instructor)->first();

                $instructorCase = new InstructorCase();
                $submitted_case = new SubmittedCase();


                $smis = SmisStudent::where('username', $request->session)->first();
                $token = Str::random(32);

                $instructorCase->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $instructorCase->email = $smis->email;
                $instructorCase->username = $smis->username;
                $instructorCase->role = $smis->role;
                $instructorCase->dept = $smis->dept;
                $instructorCase->year = $smis->year;
                $instructorCase->semister = $smis->semister;
                $instructorCase->caseHandler = $getInstructorData->username;
                $instructorCase->case = $request->studentCase;
                $instructorCase->routedCaseHandler = '';
                $instructorCase->file = $fileName;
                $instructorCase->description = $request->desc;
                $instructorCase->rdescription = '';
                $instructorCase->session = $request->session;
                $instructorCase->tracking = 0;
                $instructorCase->token = $token;
                $instructorCase->phone = $smis->contact;
                $instructorCase->gender = $smis->gender;
                $instructorCase->save();

                $submitted_case->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $submitted_case->email = $smis->email;
                $submitted_case->username = $smis->username;
                $submitted_case->response = '';
                $submitted_case->dept = $smis->dept;
                $submitted_case->year = $smis->year;
                $submitted_case->semister = $smis->semister;
                $submitted_case->phone = $smis->contact;
                $submitted_case->gender = $smis->gender;
                $submitted_case->token = $token;
                $submitted_case->caseHandler = 'Instructor:  ' . $getInstructorData->username;
                $submitted_case->case = $request->studentCase;
                $submitted_case->description = $request->desc;
                $submitted_case->rdescription = '';
                $submitted_case->file = $fileName;
                $submitted_case->session = $request->session;
                $submitted_case->tracking = 0;

                $submitted_case->save();


                Session()->flash('successCaseSubmission', 'Your case has been submitted Instructor');
                return redirect()->back();

            }  else if($caseHandler == 'Secretery') {
                $secreteryCase = new Secretery();
                $submitted_case = new SubmittedCase();

                $smis = SmisStudent::where('username', $request->session)->first();
                $token = Str::random(32);
                //dd($request->session);

                $secreteryCase->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $secreteryCase->email = $smis->email;
                $secreteryCase->username = $smis->username;
                $secreteryCase->role = $smis->role;
                $secreteryCase->dept = $smis->dept;
                $secreteryCase->year = $smis->year;
                $secreteryCase->semister = $smis->semister;
                $secreteryCase->case = $request->studentCase;;
                $secreteryCase->session = $request->session;
                $secreteryCase->tracking = 0;
                $secreteryCase->token = $token;
                $secreteryCase->phone = $smis->contact;
                $secreteryCase->gender = $smis->gender;
                $secreteryCase->save();

                $submitted_case->fullname = $smis->Fname.' '.$smis->Mname.' '.$smis->Lname;
                $submitted_case->email = $smis->email;
                $submitted_case->username = $smis->username;
                $submitted_case->response = '';
                $submitted_case->dept = $smis->dept;
                $submitted_case->year = $smis->year;
                $submitted_case->semister = $smis->semister;
                $submitted_case->phone = $smis->contact;
                $submitted_case->gender = $smis->gender;
                $submitted_case->token = $token;
                $submitted_case->caseHandler = $caseHandler;
                $submitted_case->description ='';
                $submitted_case->rdescription = '';
                $submitted_case->case = $request->studentCase;;
                $submitted_case->file = '';
                $submitted_case->session = $request->session;
                $submitted_case->tracking = 0;

                $submitted_case->save();


                Session()->flash('successCaseSubmission', 'Your case has been submitted to secretery');
                return redirect()->back();

            }  else if($caseHandler == 'Admin') {
            }
    ///////


    }
}
