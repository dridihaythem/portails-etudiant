<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Settings\DateDepotRapportController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Student\AttendanceCertificate;
use App\Http\Controllers\Student\DepotRapportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\User\UpdatePasswordController;
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


Route::group(['middleware' => 'auth:admins'], function () {
    Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic');
    Route::resource('department', DepartmentController::class)->except('show');
    Route::resource('classe', ClasseController::class)->except('show');
    Route::resource('specialite', SpecialiteController::class)->except('show');
    Route::resource('students', StudentController::class);
    Route::resource('admins', AdminController::class);
});

Route::get('/certificate-of-attendance/{key}', [AttendanceCertificate::class, 'show'])->name('certificate-of-attendance.show');

Route::group(['middleware' => 'auth:students'], function () {
    Route::resource('/certificate-of-attendance', AttendanceCertificate::class)->only(['index', 'store']);
});

Auth::routes();


Route::resource('password', UpdatePasswordController::class)->only(['index', 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('depot/rapports', DepotRapportController::class, ['as' => 'depot'])->middleware('auth:students');

Route::get('/settings/date-depots-rapports', [DateDepotRapportController::class, 'index'])->name('settings.date-depots-rapports');
Route::post('/settings/date-depots-rapports', [DateDepotRapportController::class, 'update']);
