<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SpecialiteController;
use App\Http\Controllers\StatisticController;
use App\Http\Controllers\StudentController;
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

Route::get('/statistic', [StatisticController::class, 'index'])->name('statistic');
Route::resource('department', DepartmentController::class)->except('show');
Route::resource('classe', ClasseController::class)->except('show');
Route::resource('specialite', SpecialiteController::class)->except('show');
Route::resource('students', StudentController::class)->except('show');
