<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateSupportController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationPersonController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\PersonExperienceController;
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

Route::get('/createOccupation',[OccupationController::class,'create'])->name('occupations.create');
Route::post('save_occupation',[OccupationController::class,'store'])->name('occupations.store');
Route::get('/occupations/index',[OccupationController::class, 'index'])->name('occupations.index');
Route::get('/updateOccupation/{occupation}',[OccupationController::class, 'edit'])->name('occupations.edit');
Route::put('/occupations/{id}',[OccupationController::class, 'update'])->name('occupations.update');
Route::delete('/occupations/deleteoccupation/{id}',[OccupationController::class, 'destroy'])->name('occupations.destroy');


// auth routes

Route::get('/register', [UserController::class, 'create'])->name('users.create')->middleware('guest');
Route::post('/user/register', [UserController::class, 'store'])->name('user.store');
Route::get('/selectsoft/login', [LoginController::class, 'index'])->name('user.login')->middleware('guest');
Route::post('/selectsoft/login/authenticate', [LoginController::class, 'authenticate'])->name('user.auth');
Route::get('/forgotPassword', [ForgotPasswordController::class, 'index'])->name('forgotPassword.index')->middleware('guest');
Route::post('/logout', [LogoutController::class, 'logout'])->name('user.logout');
// candidate routes

Route::get('/candidate/home', [CandidateController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/education/addEducation', [EducationPersonController::class, 'create'])->name('education.create')->middleware('auth');
Route::post('/education/store', [EducationPersonController::class, 'store'])->name('education.store');
Route::get('/myeducations/index', [EducationPersonController::class, 'index'])->name('educations.index')->middleware('auth');
Route::delete('/educations/delete/{education_person}', [EducationPersonController::class, 'destroy'])->name('educations.destroy');
Route::get('/myeducations/edit/{education_person}', [EducationPersonController::class, 'edit'])->name('educations.edit')->middleware('auth');
Route::patch('/myeducations/update/{education_person}',[EducationPersonController::class, 'update'])->name('educations.update');
Route::get('/experiencies/create', [PersonExperienceController::class, 'create'])->name('exp.create')->middleware('auth');
Route::post('/experiencies/store', [PersonExperienceController::class, 'store'])->name('exp.store');
Route::get('/myexperiencies/index', [PersonExperienceController::class, 'index'])->name('exp.index')->middleware('auth');
Route::delete('/myexperiencies/delete/{person_experience}', [PersonExperienceController::class, 'destroy'])->name('exp.destroy');
Route::get('/myexperiences/edit/{person_experience}', [PersonExperienceController::class, 'edit'])->name('exp.edit')->middleware('auth');
Route::patch('/myexperiences/update/{person_experience}', [PersonExperienceController::class, 'update'])->name('exp.update');
Route::get('/supports/create', [CandidateSupportController::class, 'create'])->name('supports.create')->middleware('auth');
Route::post('/supports/store', [CandidateSupportController::class, 'store'])->name('supports.store');
Route::get('/user/updatePassword', [UserController::class, 'updatePassword'])->name('user.updatePassword')->middleware('auth');
Route::patch('/user/updatingPassword', [UserController::class, 'storePassword'])->name('user.storePassword');
Route::get('/user/updateProfile', [CandidateController::class, 'editProfile'])->name('candidate.editProfile')->middleware('auth');
Route::patch('/user/saveProfile', [CandidateController::class, 'updateProfile'])->name('candidate.saveProfile');
// selector routes

Route::get('/selector/home', [SelectorController::class, 'index'])->name('selector.index')->middleware('auth');

// recruiter routes


Route::get('/recruiter/home', [RecruiterController::class, 'index'])->name('recruiter.index')->middleware('auth');
Route::post('/createCompany', [CompanyController::class, 'store'])->name('company.store');
Route::get('/companies/allCompanies', [CompanyController::class, 'index'])->name('company.index')->middleware('auth');
Route::get('/companies/findCompany', [CompanyController::class, 'findCompany'])->name('company.findCompany');
Route::get('/recruiter/joinCompany/{company}', [RecruiterController::class, 'joinCompany'])->name('recruiter.joinCompany');
Route::get('/company/viewCompany/{company}/info', [CompanyController::class, 'show'])->name('company.show')->middleware('auth');
Route::post('/recruiter/disCompany/{company}', [RecruiterController::class, 'disassociateCompany'])->name('recruiter.disassociate');
// instructor routes

Route::get('/admin/home/candidates', [InstructorController::class, 'indexlistCandidates'])->name('instructor.index')->middleware('auth');
Route::get('/admin/home/recruiters', [InstructorController::class, 'indexListRecruiters'])->name('instructor.recruiters')->middleware('auth');
Route::get('/admin/home/selectors', [InstructorController::class, 'indexListSelectors'])->name('instructor.selectors')->middleware('auth');
Route::get('/admin/home/instructors', [InstructorCOntroller::class, 'indexListInstructors'])->name('instructor.instructors')->middleware('auth');
Route::get('/admin/edirUserRole/{user}', [UserController::class, 'editUserRole'])->name('instructor.editUserRole')->middleware('auth');
Route::patch('/admin/updateUserRole/{userMod}', [UserController::class, 'updateUserRole'])->name('instructor.updateRole');

//mail

Route::patch('/updatePassword', [ForgotPasswordController::class, 'findUser'])->name('forgotPassword.find');
