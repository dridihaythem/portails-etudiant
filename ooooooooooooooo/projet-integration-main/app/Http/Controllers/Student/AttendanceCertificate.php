<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceCertificate extends Controller
{

    public function index()
    {
        $certificates = Auth::user()->certificates;
        return view("certificates.index", ['certificates' => $certificates]);
    }

    public function store()
    {
        $certificate = Certificate::create([
            'student_id' => Auth::user()->id,
            'key' => Str()->uuid()->toString()
        ]);

        return redirect()->route('certificate-of-attendance.show', $certificate->key);
    }

    public function show($key)
    {
        $certificate = Certificate::where('key', $key)->firstOrFail();
        return view("certificates.show", ['certificate' => $certificate]);
    }
}
