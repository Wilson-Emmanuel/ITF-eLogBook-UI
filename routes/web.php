<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CoordinatorController;
use App\Http\Controllers\ManagerController;
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


Route::get('/itf/profile',function(){
    return view('itf.profile');
})->name("itf_profile");


Route::get('/login', [ProcessLoginController::class,'view'])->name('long'); //#111932
Route::post('/process_login', [ProcessLoginController::class,'login'])->name('process_login'); //#111932
Route::get('/logout', [ProcessLoginController::class,'logout'])->name('logout'); //#111932

//////////////////////////////////////////////
/// //STUDENTS
Route::middleware(['student_login'])->group(function () {
    Route::prefix('student')->group(function () {
            // Matches The "/student/dashboard" URL
        //Route::get('/user/{id}', [UserController::class, 'show']);
        Route::get('/dashboard',[StudentController::class,'index'] )->name("student_dashboard");
    });
});

//////////////////////////////////////////////
/// //ITF ADMINS
Route::middleware(['admin_login'])->group(function () {
    Route::prefix('itf')->group(function () {
        Route::get('/dashboard',[AdminController::class,'index'] )->name("itf_dashboard");
        Route::post('/update_password',[AdminController::class,'updatePassword'] )->name("itf_update_password");
        Route::get('/create_coordinator',[AdminController::class,'showCreateCoordinator'] )->name("itf_show_create_coordinator");
        Route::post('/create_coordinator',[AdminController::class,'createCoordinator'] )->name("itf_create_coordinator");
    });
});

//////////////////////////////////////////////
/// //COORDINATORS
Route::middleware(['coordinator_login'])->group(function () {
    Route::prefix('coordinator')->group(function () {
        Route::get('/dashboard',[CoordinatorController::class,'index'] )->name("coordinator_dashboard");
    });
});

//////////////////////////////////////////////
/// //MANAGER
Route::middleware(['manager_login'])->group(function () {
    Route::prefix('coordinator')->group(function () {
        Route::get('/dashboard',[ManagerController::class,'index'] )->name("manager_dashboard");
    });
});

