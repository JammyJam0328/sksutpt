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
    Route::get('manage/payments',\App\Http\Livewire\A\ManagePayments::class)->name('admin.manage.payments');
});

Route::prefix('/applicant')->middleware(['auth:sanctum', 'verified','user'])->group(function () {
   Route::get('/homepage',\App\Http\Livewire\U\Homepage::class)->name('user.homepage');
});