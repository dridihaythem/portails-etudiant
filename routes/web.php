<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Enseignant\RapportController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Settings\DateDepotRapportController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\Student\AttendanceCertificate;
use App\Http\Controllers\Student\DepotRapportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\User\UpdatePasswordController;
use App\Http\Controllers\MatierController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Guest\NewsController as GuestNewsController;
use App\Http\Controllers\StudentMatiereController;
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

Route::get('/', [GuestNewsController::class, 'index'])->name('index');
Route::get('/actualite/{id}', [GuestNewsController::class, 'show'])->name('guest.news');


Route::group(['middleware' => 'auth:admins'], function () {
    Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic');
    Route::resource('department', DepartmentController::class)->except('show');
    Route::resource('classe', ClasseController::class)->except('show');
    Route::resource('specialite', SpecialiteController::class)->except('show');
    Route::resource('students', StudentController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('matieres', MatierController::class);
    Route::resource('enseignants', EnseignantController::class);
    Route::get('file-upload', [FileController::class, 'index']);
    Route::post('file-upload', [FileController::class, 'store'])->name('file.store');
});

Route::group(['middleware' => 'auth:enseignants'], function () {
    Route::get('/rapports', [RapportController::class, 'index'])->name('rapports');
    Route::get('/rapports/{id}', [RapportController::class, 'show'])->name('rapports.show');
});

Route::get('/certificate-of-attendance/{key}', [AttendanceCertificate::class, 'show'])->name('certificate-of-attendance.show');

Route::group(['middleware' => 'auth:students'], function () {
    Route::resource('/certificate-of-attendance', AttendanceCertificate::class)->only(['index', 'store']);
    Route::resource('/student/matieres', StudentMatiereController::class, ['as' => 'meet']);
});

Auth::routes();


Route::resource('password', UpdatePasswordController::class)->only(['index', 'store']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('depot/rapports', DepotRapportController::class, ['as' => 'depot'])->middleware('auth:students');

Route::get('/settings/date-depots-rapports', [DateDepotRapportController::class, 'index'])->name('settings.date-depots-rapports');
Route::post('/settings/date-depots-rapports', [DateDepotRapportController::class, 'update']);

Route::resource('news', NewsController::class);
