<?php

use App\Http\Controllers\ApplicationsController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateSupportController;
use App\Http\Controllers\ChargeController;
use App\Http\Controllers\CitationController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EducationPersonController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\OccupationController;
use App\Http\Controllers\OccupationFunctionController;
use App\Http\Controllers\PersonExperienceController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\SelectorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VacancieController;
use App\Http\Controllers\VacancieStudyController;
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
})->name('system.index')->middleware('guest');

//occupations routes

Route::get('/createOccupation',[OccupationController::class,'create'])->name('occupations.create')->middleware('auth');
Route::post('save_occupation',[OccupationController::class,'store'])->name('occupations.store');
Route::get('/occupations/index',[OccupationController::class, 'index'])->name('occupations.index')->middleware('auth');
Route::get('/updateOccupation/{occupation}',[OccupationController::class, 'edit'])->name('occupations.edit')->middleware('auth');
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
Route::get('/candidate/curriculum', [CandidateController::class, 'readCurriculum'])->name('candidate.curriculum')->middleware('auth');
Route::get('/candidate/updateProfile/{candidate}', [CandidateController::class, 'editProfile'])->name('candidate.editProfile')->middleware('auth');
Route::patch('/candidate/saveProfile/{candidate}', [CandidateController::class, 'updateProfile'])->name('candidate.saveProfile');
Route::patch('/candidate/updateSkills/{candidate}', [CandidateController::class, 'updateSkills'])->name('candidate.saveSkills');
Route::get('/vacancies/searchV', [VacancieController::class, 'indexToCandidate'])->name('vacancies.searchToCandidate');
Route::get('/vacancie/showC/{vacancie}', [VacancieController::class, 'showToCandidate'])->name('vacancie.showCandidate')->middleware('auth');
Route::post('/application/save/{user}/{vacancie}', [ApplicationsController::class, 'store'])->name('candidate.postulation');
// selector routes

Route::get('/selector/home', [SelectorController::class, 'index'])->name('selector.index')->middleware('auth');
Route::get('/selector/joinCompany/{company}/{selector}', [SelectorController::class, 'joinCompany'])->name('selector.joinCompany');
Route::get('/selector/viewApplications/{vacancie}', [ApplicationsController::class, 'showApplications'])->name('selector.viewApplications')->middleware('auth');
Route::post('/selector/disCompany/{company}', [SelectorController::class, 'disassociateCompany'])->name('selector.dissasociate');
Route::get('/selector/viewCurriculum/{application}', [SelectorController::class, 'viewCurriculum'])->name('selector.curriculum')->middleware('auth');
Route::get('/updateInterview/{application}', [ApplicationsController::class, 'interview'])->name('selector.interwiew')->middleware('auth');
Route::patch('/selector/updateInterviewScore/{application}', [ApplicationsController::class, 'updateInterwievScore'])->name('selector.updateInterviewScore');
Route::get('/updateTechcnicalScore/{application}', [ApplicationsController::class, 'technical'])->name('selector.technical')->middleware('auth');
Route::patch('/selector/updateTechnicalScore/{application}', [ApplicationsController::class, 'updateTechnicalScore'])->name('selector.updateTechnicalScore');
Route::get('/updatePersonalityScore/{application}', [ApplicationsController::class, 'personality'])->name('selector.personality')->middleware('auth');
Route::patch('/selector/updatePersonalityScore/{application}', [ApplicationsController::class, 'updatePersonalityScore'])->name('selector.personalityScore');
Route::get('/selector/createCitation/{application}', [CitationController::class, 'create'])->name('selector.createCitation')->middleware('auth');
Route::post('/citations/storeCitation/{application}', [CitationController::class, 'store'])->name('selector.storeCitation');
// recruiter routes

Route::get('/recruiter/home', [RecruiterController::class, 'index'])->name('recruiter.index')->middleware('auth');
Route::post('/createCompany', [CompanyController::class, 'store'])->name('company.store');
Route::get('/companies/allCompanies', [CompanyController::class, 'index'])->name('company.index')->middleware('auth');
Route::get('/companies/findCompany', [CompanyController::class, 'findCompany'])->name('company.findCompany');
Route::get('/recruiter/joinCompany/{company}', [RecruiterController::class, 'joinCompany'])->name('recruiter.joinCompany');
Route::get('/company/viewCompany/{company}/info', [CompanyController::class, 'show'])->name('company.show')->middleware('auth');
Route::post('/recruiter/disCompany/{company}', [RecruiterController::class, 'disassociateCompany'])->name('recruiter.disassociate');
Route::get('/charges/createCharge', [ChargeController::class, 'create'])->name('charges.create')->middleware('auth');
Route::post('/charges/storeCharge', [ChargeController::class, 'store'])->name('charges.store');
Route::get('/charges/index/{company}', [ChargeController::class, 'index'])->name('charges.index')->middleware('auth');
Route::delete('/charges/delete/{charge}', [ChargeController::class, 'destroy'])->name('charges.destroy');
Route::get('/charges/edit/{charge}/{company}', [ChargeController::class, 'edit'])->name('charges.edit')->middleware('auth');
Route::patch('/charges/update/{charge}/{company}', [ChargeController::class, 'update'])->name('charges.update');
Route::get('/vacancies/index/{company}', [VacancieController::class, 'index'])->name('vacancies.index')->middleware('auth');
Route::get('/vacancies/create', [VacancieController::class, 'create'])->name('vacancies.create')->middleware('auth');
Route::post('/vacancies/store/{company}', [VacancieController::class, 'store'])->name('vacancies.store');
Route::get('/vacancie/show/{vacancie}', [VacancieController::class, 'showToRecruiter'])->name('vacancies.show')->middleware('auth');
Route::patch('/vacancie/editStatus/{vacancie}', [VacancieController::class, 'editStatus'])->name('vacancies.editStatus');
Route::get('/vacancies/search/{company}', [VacancieController::class, 'findVacancieByCompany'])->name('vacancies.findByCompany');
Route::get('/occupation/show/{occupation}', [OccupationController::class, 'show'])->name('occupation.show')->middleware('auth');
Route::get('/occupationFunctions/create/{occupation}', [OccupationFunctionController::class, 'create'])->name('occupationFunction.create')->middleware('auth');
Route::post('/occupationFunctions/store/{occupation}', [OccupationFunctionController::class, 'store'])->name('occupationFunction.store');
Route::get('/occupationFunctions/edit/{occupation_function}/{occupation}', [OccupationFunctionController::class, 'edit'])->name('occupationFunction.edit')->middleware('auth');
Route::post('/occupationFunctions/update/{occupation_function}/{occupation}', [OccupationFunctionController::class, 'update'])->name('occupationFunction.update');
Route::delete('/occupationFunctions/delete/{occupation_function}/{occupation}', [OccupationFunctionController::class, 'destroy'])->name('occupationFunction.destroy');
Route::get('/vacancie/edit/{vacancie}/{company}', [VacancieController::class, 'edit'])->name('vacancies.edit')->middleware('auth');
Route::patch('/vacancie/update/{vacancie}/{company}', [VacancieController::class, 'update'])->name('vacancies.update');
Route::get('/studyVacant/create/{vacancie}', [VacancieStudyController::class, 'create'])->name('studyVacant.create')->middleware('auth');
Route::post('/studyVacant/store/{vacancie}', [VacancieStudyController::class, 'store'])->name('studyVacant.store');
Route::delete('/studyVacant/destroy/{vacancie_study}', [VacancieStudyController::class, 'destroy'])->name('studyVacant.destroy');
// instructor routes


Route::get('/admin/home/candidates', [InstructorController::class, 'indexlistCandidates'])->name('instructor.index')->middleware('auth');
Route::get('/admin/home/recruiters', [InstructorController::class, 'indexListRecruiters'])->name('instructor.recruiters')->middleware('auth');
Route::get('/admin/home/selectors', [InstructorController::class, 'indexListSelectors'])->name('instructor.selectors')->middleware('auth');
Route::get('/admin/home/instructors', [InstructorCOntroller::class, 'indexListInstructors'])->name('instructor.instructors')->middleware('auth');
Route::get('/admin/edirUserRole/{user}', [UserController::class, 'editUserRole'])->name('instructor.editUserRole')->middleware('auth');
Route::patch('/admin/updateUserRole/{userMod}', [UserController::class, 'updateUserRole'])->name('instructor.updateRole');

//mail

Route::patch('/updatePassword', [ForgotPasswordController::class, 'findUser'])->name('forgotPassword.find');
