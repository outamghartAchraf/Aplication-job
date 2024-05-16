<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\ListJobLIstengController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UploadFileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


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
Route::get('/', [ListJobListengController::class, 'index'])->name('listing.index');

Route::get('/company/{id}', [ListJobListengController::class, 'company'])->name('details_profile_company');
Route::post('/contactus', [ListJobListengController::class, 'sendEmailContact'])->name('contactus');


Route::get('jobs/{listeng:slug}', [ListJobLIstengController::class, 'show'])->name('jobs.show');
Route::post('/upload/file', [UploadFileController::class, 'upload'])->middleware('auth');

Route::get('/dash', function () {
    return view('layouts.admin.dash_admin');
});

 
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/register/seekre',[UserController::class, 'index'])->name('register_seeker')
->middleware('CheckAuth');;
Route::post('/register/seekre',[UserController::class, 'storeSeeker'])->name('seeker.store');
Route::get('/login', [UserController::class, 'login'])->name('login')
->middleware('CheckAuth');
Route::post('/login', [UserController::class, 'StoreLogin'])->name('login.store');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/user/profile',[UserController::class, 'profile'])->name('user.profile')->middleware('auth');
Route::post('/profile/update',[UserController::class, 'UpdateProfile'])->name('user.update.profile')->middleware('auth');
Route::get('/user/profile/seeker',[UserController::class, 'SeekerProfile'])->name('user.Seeker.Profile')->middleware('auth');
Route::post('/user/password',[UserController::class, 'changePassword'])->name('user.password')->middleware('auth');
Route::post('/upload/resume',[UserController::class, 'uploadResum'])->name('upload.resum')->middleware('auth');

Route::get('/job/user/apply',[UserController::class, 'jobApply'])
->name('jobs.user_apply')
->middleware('auth');

Route::delete('/apply/delete/{slug}',[UserController::class, 'AnullerApply'])
->name('annuler.apply')
->middleware('auth');


 
Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['verified','IsEmployer'])
->name('dashboard');
Route::get('/verify',[DashboardController::class, 'verify'])->name('verification.notice');
Route::get('/reset/send/email',[DashboardController::class, 'reset'])->name('verification.reset');

Route::get('/admin',[AdminController::class, 'AdminDashboard'])
->middleware('isAdmin')
->name('admin');

Route::get('/admin/users',[AdminController::class, 'Pageusers'])
->middleware('isAdmin')
->name('admin.users');

Route::get('/admin/jobs',[AdminController::class, 'pagejobs'])
->middleware('isAdmin')
->name('admin.users');


Route::get('/admin/applicants',[AdminController::class, 'applicants'])
->middleware('isAdmin')
->name('admin.applicants');

Route::get('/admin/applicants/{id}',[AdminController::class, 'applicantsDetails'])
->middleware('isAdmin')
->name('admin.datails.applicants');








Route::get('/register/employer',[UserController::class, 'EmployerCompany'])
->name('register_employer')
->middleware('CheckAuth');;
Route::post('/register/employer',[UserController::class, 'StoreEmployerCompany'])->name('store_employer');

Route::get('/subsription', [SubscriptionController::class, "subindex"])->name('sub');
Route::get('/sub/weekly', [SubscriptionController::class, "intpayment"])->name('sub.weekly');
Route::get('/sub/monthly', [SubscriptionController::class, "intpayment"])->name('sub.monthly');
Route::get('/sub/yearly', [SubscriptionController::class, "intpayment"])->name('sub.yearly');

Route::get('/payment/seccess', [SubscriptionController::class, "paymentSuccess"])->name('pay.success');
Route::get('/payment/canncel', [SubscriptionController::class, "canncel"])->name('pay.cancel');

Route::get('/jobs/create/company', [JobsController::class , 'create'])
 
->name('jobs.create');

Route::post('/jobs/store', [JobsController::class , 'store'])

->name('jobs.store');

Route::get('/jobs/{listeng}/edit', [JobsController::class , 'edit'])
->name('jobs.edit');
Route::put('jobs/{id}/update', [JobsController::class, 'update'])
->name('jobs.update');

Route::get('/jobs', [JobsController::class , 'index'])
->name('jobs.index');

Route::delete('/jobs/{id}/destroy', [JobsController::class, 'detroy'])
->name('jobs.destroy');

Route::get('applicants',[ApplicantController::class , 'index'])
->name('applicants.index')->middleware(['auth','IsEmployer']);

Route::get('applicants/{slug}',[ApplicantController::class, 'show'])->name('applicants.show');
Route::post('shortlist/{listengs_id}/{user_id}',[ApplicantController::class, 'shortlisrt'])
->name('Applicants.shortlist');

Route::post('/applicant{listengID}/submit', [ApplicantController::class, 'apply'])
->name('applicant.submit')
->middleware('auth');


Route::get('/showmessage', [ApplicantController::class, 'showmessage'])
->name('show.msg')
->middleware('auth');


