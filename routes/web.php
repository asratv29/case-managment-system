<?php
use App\Http\Controllers\AcRouteController;
use App\Http\Controllers\ChairRouteController;
use App\Http\Controllers\CollageController;
use App\Http\Controllers\DeanRouteController;
use App\Http\Controllers\InstructorRouteController;
use App\Http\Controllers\MatchCaseController;

use App\Http\Controllers\RegistralRouteController;
use App\Http\Controllers\SecreteryRouteController;
use App\Http\Controllers\StudentRouteController;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

use App\Http\Controllers\AdminRouteController;



use App\Http\Controllers\UserAuth;
use App\Http\Controllers\CategoryController;
use App\Http\Middleware\LogChecker;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::group(['middleware' => ['clearHistory']], function() {

////////// Login routes

    Route::get('/', function () {
        return view('auth.login.index');
    })->middleware('logchecker');

    Route::post('login', [LoginController::class, 'login'])
    ->name('login.post');

/////////  End Login routes



////////  Logout Routes Starts
Route::get('studentLogout', [LogoutController::class, 'studentLogout'])->name('student.studentLogout');
Route::get('adminLogout', [LogoutController::class, 'adminLogout'])->name('admin.adminLogout');
Route::get('registralLogout', [LogoutController::class, 'registralLogout'])->name('registral.registralLogout');
Route::get('collageLogout', [LogoutController::class, 'collageLogout'])->name('collage.collageLogout');
Route::get('acLogout', [LogoutController::class, 'acLogout'])->name('ac.acLogout');
Route::get('deanLogout', [LogoutController::class, 'deanLogout'])->name('dean.deanLogout');
Route::get('chairLogout', [LogoutController::class, 'chairLogout'])->name('chair.chairLogout');
Route::get('instructorLogout', [LogoutController::class, 'instructorLogout'])->name('instructor.instructorLogout');
Route::get('secreteryLogout', [LogoutController::class, 'secreteryLogout'])->name('secretery.secreteryLogout');
///////   Logout Routes Ends



///////  Registration Routes Starts
Route::get('/register', [UserAuth::class, 'register'])
        ->middleware('logchecker');

Route::post('/stundentSave', [UserAuth::class, 'stundentSave'])
        ->name('auth.registration.registration');
//////   Registration Routes Ends


/////  ForgotPassword Routes Starts
Route::get('/forgotPassword', [UserAuth::class, 'forgetPassword']);
Route::post('/checkEmailOrUsername', [UserAuth::class, 'checkEmailOrUsername']);
Route::post('/forgotPassword/checkEmail', [UserAuth::class, 'checkEmail'])->name('auth.password.checkUsername');
////   ForgotPassword Routes Ends


////// Start admin routes
Route::get('/admin/admin-log', [AdminRouteController::class, "adminDashBoard"])->middleware('admin');

Route::get('/admin/registral', [AdminRouteController::class, "registral"])->middleware('admin');
Route::get('/admin/admin', [AdminRouteController::class, "admin"])->middleware('admin');
Route::get('/admin/ac', [AdminRouteController::class, "ac"])->middleware('admin');
Route::get('/admin/dean', [AdminRouteController::class, "dean"])->middleware('admin');
Route::get('/admin/chair', [AdminRouteController::class, "chair"])->middleware('admin');
Route::get('/admin/instructor',[AdminRouteController::class, "instructor"])->middleware('admin');
Route::get('/admin/secretery',[AdminRouteController::class, "secretery"])->middleware('admin');
Route::get('/admin/student', [AdminRouteController::class, "student"])->middleware('admin');


Route::post('/admin/update/a/u/{id}', [AdminRouteController::class, 'updateUsers']);
//
Route::post('/admin/s/registrar', [AdminRouteController::class, 'storeRegistral']);
Route::get('/admin/r/{id}/update', [AdminRouteController::class, 'updateRegistral']);
Route::get('/admin/r/{id}/delete', [AdminRouteController::class, 'deleteRegistral']);
//
Route::post('/admin/a/store', [AdminRouteController::class, 'storeAdmin']);
Route::get('/admin/a/{id}/update', [AdminRouteController::class, 'updateAdmin']);
Route::get('/admin/a/{id}/delete', [AdminRouteController::class, 'deleteAdmin']);
//

Route::post('/admin/d/store', [AdminRouteController::class, 'storeDean']);
Route::get('/admin/d/{id}/delete', [AdminRouteController::class, 'deleteDean']);
Route::get('/admin/d/{id}/update', [AdminRouteController::class, 'updateDean']);
//
Route::post('/admin/c/store', [AdminRouteController::class, 'storeChair']);
Route::get('/admin/c/{id}/update', [AdminRouteController::class, 'updateChair']);
Route::get('/admin/c/{id}/delete', [AdminRouteController::class, 'deleteChair']);
//
Route::post('/admin/i/store', [AdminRouteController::class, 'storeInstructor']);
Route::get('admin/i/{id}/update',  [AdminRouteController::class, 'updateInstructor']);
Route::get('admin/i/{id}/delete',  [AdminRouteController::class, 'deleteInstructor']);
//

Route::post('/admin/s/store', [AdminRouteController::class, 'storeSecretery']);
Route::get('/admin/s/{id}/update', [AdminRouteController::class, 'updateSecretery']);
Route::get('/admin/s/{id}/delete', [AdminRouteController::class, 'deleteSecretery']);

//
Route::post('/admin/stud/store', [AdminRouteController::class, 'storeStudent']);
Route::get('/admin/stud/{id}/update', [AdminRouteController::class, 'updateStudent']);
Route::get('/admin/stud/disable/{id}/account', [AdminRouteController::class, 'disableAccount']);
Route::get('/admin/stud/enable/{id}/account', [AdminRouteController::class, 'enableAccount']);


///
Route::post('/admin/student/store', [AdminRouteController::class, 'storeStudent'])->name('admin.storeStudent');


////// End admin routes

///////  Student Routes Starts
Route::get('student/student-log', [StudentRouteController::class, 'studentDashboard'])->middleware('student');
//Route::get('student/view-profile', [StudentRouteController::class, 'studentProfile'])->middleware('student');
Route::get('student/submit-case', [StudentRouteController::class, 'studentSubmitCase'])->middleware('student');

Route::post('student/submit-case-post', [MatchCaseController::class, 'submitCasePost']);

Route::get('student/{view_case}', [StudentRouteController::class, 'studentViewCase']);
Route::get('p/{view}', [StudentRouteController::class, 'view']);
Route::get('/student/view/{id}', [StudentRouteController::class, 'profile']);
Route::get('stud/{id}', [StudentRouteController::class, 'track']);



//////   Student Routes Ends



///// Secretery Routes Starts
Route::get('secretery/secretery-log', [SecreteryRouteController::class, 'secreteryLogin']);
Route::get('secretery/secretery-case', [SecreteryRouteController::class, 'viewCase']);
Route::get('secretery/{id}', [SecreteryRouteController::class, 'reset']);

Route::post('secretery/{token}', [SecreteryRouteController::class, 'resetPasswordPost'])->name('resetPasswordPost');
///// Secretery Routes Ends


///////  Dean Routes Starts
Route::get('dean/dean-log', [DeanRouteController::class, 'deanLogin'])->middleware('dean');
Route::get('/dean/case', [DeanRouteController::class, 'case'])->middleware('dean');
Route::get('/dean/{id}', [DeanRouteController::class, 'view'])->middleware('dean');

Route::post('/dean/response/{token}', [DeanRouteController::class , 'response']);
//////   Dean Routes Ends


///////  Chair Routes Starts
Route::get('chairman/chairman-log', [ChairRouteController::class, 'chairLogin'])->middleware('chair');
Route::get('chairman/{view}', [ChairRouteController::class, 'viewCase'])->middleware('chair');
Route::get('{id}', [ChairRouteController::class, 'view']);

Route::post('response/{token}', [ChairRouteController::class, 'response']);
//////   Chair Routes Ends


///////  Instructor Routes Starts
Route::get('instructor/instructor-log', [InstructorRouteController::class, 'instructorLogin'])->middleware('instructor');
Route::get('instructor/{user}', [InstructorRouteController::class, 'viewCase'])->middleware('instructor');
Route::get('iii/{id}', [InstructorRouteController::class, 'view'])->middleware('instructor');

Route::post('instructor/response/{token}', [InstructorRouteController::class, 'response']);

//////   Instructor Routes Ends

/////  Ac Routes Starts

Route::get('ac/ac-log', [AcRouteController::class, 'logIn'])->middleware('ac');
Route::get('ac/case', [AcRouteController::class, 'case'])->middleware('ac');
Route::get('ac/{id}', [AcRouteController::class, 'view'])->middleware('ac');
Route::post('ac/response/{token}', [AcRouteController::class, 'response']);

/////  Ac Routes Ends

/////  Registral Routes Starts
Route::get('registral/registral-log', [RegistralRouteController::class, 'logIn'])->middleware('registral');
Route::get('registral/case', [RegistralRouteController::class, 'case'])->middleware('registral');
Route::get('registral/{id}', [RegistralRouteController::class, 'view'])->middleware('registral');
Route::post('registral/response/{token}', [RegistralRouteController::class, 'response']);

/////  Registral Routes Ends

///// Collage Routes Starts
Route::get('collage/collage-log', [CollageController::class, 'logIn'])->middleware('collage');
Route::get('collage/case', [CollageController::class, 'case'])->middleware('collage');
Route::get('collage/{id}', [CollageController::class, 'view'])->middleware('collage');
Route::post('collage/response/{token}', [CollageController::class, 'response']);
///// Collage Routes Ends
});









Route::post('/add', [UserAuth::class, 'add'])->name('add');


Route::post('/register-user-student', [UserAuth::class, 'registerStudent']);
Route::post('/register-user-chair', [UserAuth::class, 'registerChair']);
Route::post('/register-user-dean', [UserAuth::class, 'registerDean']);
Route::post('/register-user-instructor', [UserAuth::class, 'registerInstructor']);

Route::get('/her', [CategoryController::class, 'match']);

//Route::post('/auth/password/{checkUsername}', [UserAuth::class, 'checkEmailOrUsername']);

Route::group(['middleware' => ['logchecker']], function() {


});


Route::group(['middleware' => 'admin'], function() {


});

Route::group(['middleware' => 'chair'], function() {

});

Route::group(['middleware' => 'instuctor'], function() {

});

Route::group(['middleware' => 'secretery'], function() {

});

Route::group(['middleware' => 'student'], function() {

});


Route::get('/admin/layoute', function() {
    return view('admin.admin');
});

Route::get('/profile/layoute', function() {
    return view('app.profile');
});

Route::get('/profile/reg', function() {
    return view('dropdown');
});

