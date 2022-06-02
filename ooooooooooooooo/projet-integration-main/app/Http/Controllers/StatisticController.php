<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Department;
use App\Models\Specialite;
use App\Models\Student;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        $classes_count = Classe::count();
        $departments_count = Department::count();
        $specialites_count = Specialite::count();
        $students_count = Student::count();
        return view('statistic', compact('classes_count', 'departments_count', 'specialites_count', 'students_count'));
    }
}
