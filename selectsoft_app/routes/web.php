<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\EducationPersonController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\SelectorController;
use App\Http\Controllers\UserController;
use App\Mail\WelcomeMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

// index route

Route::get('/', function() {
    return view('index');
})->name('system.index');

Route::get('create_occupation',[OccupationController::class,'create'])->name('create_occupation');
Route::post('save_occupation',[OccupationController::class,'store'])->name('save_occupation');
Route::get('/occupations/index',[OccupationController::class, 'index'])->name('occupations.index');
Route::get('/updateOccupation/{occupation}',[OccupationController::class, 'edit'])->name('occupations.edit');
Route::put('/occupations/{id}',[OccupationController::class, 'update'])->name('update_occupation');
Route::delete('/occupations/deleteoccupation/{id}',[OccupationController::class, 'destroy'])->name('delete_occupation');


// auth routes

Route::get('/register', [UserController::class, 'create'])->name('users.create')->middleware('guest');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');
Route::get('/selectsoft/login', [LoginController::class, 'index'])->name('user.login')->middleware('guest');
Route::post('/selectsoft/login/authenticate', [LoginController::class, 'authenticate'])->name('user.auth');
Route::get('/forgotPassword', [ForgotPasswordController::class, 'index'])->name('forgotPassword.index');
Route::post('/logout', [LogoutController::class, 'logout'])->name('user.logout');
// candidate routes

Route::get('/candidate/home', [CandidateController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/education/addEducation', [EducationPersonController::class, 'create'])->name('education.create')->middleware('auth');
Route::post('/education/store', [EducationPersonController::class, 'store'])->name('education.store');
Route::get('/myeducations', [EducationPersonController::class, 'index'])->name('educations.index');
// selector routes

Route::get('/selector/home', [SelectorController::class, 'index'])->name('selector.index')->middleware('auth');

// recruiter routes

Route::get('/recruiter/home', [RecruiterController::class, 'index'])->name('recruiter.index')->middleware('auth');

// instructor routes

Route::get('/admin/home', [InstructorController::class, 'index'])->name('instructor.index')->middleware('auth');

//mail

Route::patch('/updatePassword', [ForgotPasswordController::class, 'findUser'])->name('forgotPassword.find');
