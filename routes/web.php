<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ProcessLoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name("home");



Route::get('/login', [ProcessLoginController::class,'view'])->name('login'); //#111932
Route::post('/process_login', [ProcessLoginController::class,'login'])->name('process_login'); //#111932
Route::get('/logout', [ProcessLoginController::class,'logout'])->name('logout'); //#111932
Route::post('/update_password',[ProcessLoginController::class,'updatePassword']);

//////////////////////////////////////////////
/// //STUDENTS
Route::middleware(['student_login'])->group(function () {
    Route::prefix('student')->group(function () {
            // Matches The "/student/dashboard" URL
        //Route::get('/user/{id}', [UserController::class, 'show']);
        Route::get('/dashboard',[StudentController::class,'index'] )->name("student_dashboard");
        Route::get('/update_password',[StudentController::class,'show_update_password'] )->name("student_update_password");
        Route::get('/update_bank',[StudentController::class,'show_update_bank'] )->name("student_update_bank");
        Route::post('/update_bank',[StudentController::class,'update_bank'] );
        Route::get('/logbook/{week_no}',[StudentController::class,'showLogBook'])->name("student_show_logbook");
        Route::get('/logbook/{week}/{day}',[StudentController::class,'show_fill_logbook'])->name("student_show_fill_logbook");
        Route::post('/logbook',[StudentController::class,'fill_logbook']);
    });
});

//////////////////////////////////////////////
/// //ITF ADMINS
Route::middleware(['admin_login'])->group(function () {
    Route::prefix('itf')->group(function () {
        Route::get('/dashboard',[AdminController::class,'index'] )->name("itf_dashboard");
        Route::get('/create_coordinator',[AdminController::class,'showCreateCoordinator'] )->name("itf_show_create_coordinator");
        Route::post('/create_coordinator',[AdminController::class,'storeCoordinator'] )->name("itf_create_coordinator");
        Route::get('/create_school',[SchoolController::class,'create'])->name("show_create_school");
        Route::post('/create_school',[SchoolController::class,'store']);
        Route::get('/create_staff',[AdminController::class,'create'])->name("show_create_staff");
        Route::post('/create_staff',[AdminController::class,'store']);
        Route::post('/sign_logbook',[AdminController::class,'signLogBook'] );
        Route::post('/pay',[AdminController::class,'pay'] );

        Route::get('/coordinators/{current}',[CoordinatorController::class,'show_coordinators'])->name("show_coordinators");
        Route::get('/coordinator/{coordinator_id}',[CoordinatorController::class,'view_coordinator'])->name("view_coordinator");
        Route::get('/coordinator_students/{email}',[StudentController::class,'show_coordinator_students'])->name("show_coordinator_students");
    });
});

//////////////////////////////////////////////
/// //COORDINATORS
Route::middleware(['coordinator_login'])->group(function () {
    Route::prefix('coordinator')->group(function () {
        Route::get('/dashboard',[CoordinatorController::class,'index'] )->name("coordinator_dashboard");
        Route::get('/create_student',[StudentController::class,'create'] )->name("coordinator_show_create_student");
        Route::post('/create_student',[StudentController::class,'store'] );
        Route::get('/create_manager',[ManagerController::class,'create'] )->name("coordinator_show_create_manager");
        Route::post('/create_manager',[ManagerController::class,'store'] );

        Route::get('/update_remark/{student_id}',[CoordinatorController::class,'show_update_remark_detail'])->name("show_update_remark");
        Route::post('/update_remark',[CoordinatorController::class,'update_remark'] );
    });
});

//////////////////////////////////////////////
/// //MANAGER
Route::middleware(['manager_login'])->group(function () {
    Route::prefix('manager')->group(function () {
        Route::get('/dashboard',[ManagerController::class,'index'] )->name("manager_dashboard");
        Route::post('/sign_week',[ManagerController::class,'signWeek'] );

    });
});

Route::middleware(['except_student_auth'])->group(function (){
    Route::get('/students/{current}',[StudentController::class,'show_students'])->name("show_students");
    Route::get('/student/{student_id}',[StudentController::class,'view_student'])->name("view_student");
    Route::get('/logbook/{student_id}/{week_no}',[StudentController::class,'view_student_logbook'])->name("view_student_logbook");
});

Route::middleware(['except_student_and_manager_auth'])->group(function (){
    Route::get('/managers/{current}',[ManagerController::class,'show_managers'])->name("show_managers");
    Route::get('/managers/{manager_id}',[ManagerController::class,'view_manager'])->name("view_manager");
});

