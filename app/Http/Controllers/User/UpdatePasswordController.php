<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdatePasswordController extends Controller
{
    public function index(Request $request)
    {
        abort_if(!Auth::guard('admins')->check() && !Auth::guard('students')->check() && !Auth::guard('enseignants')->check(), 404);

        return view('password');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        // check password

        $current_password_valid = false;

        if (Auth::guard('admins')->check()) {
            $current_password_valid = Hash::check($request->current_password, Auth::guard('admins')->user()->password);
        } elseif (Auth::guard('students')->check()) {
            $current_password_valid = Hash::check($request->current_password, Auth::guard('students')->user()->password);
        } elseif (Auth::guard('enseignants')->check()) {
            $current_password_valid = Hash::check($request->current_password, Auth::guard('enseignants')->user()->password);
        }

        $validator->after(function ($validator) use ($current_password_valid) {
            if (!$current_password_valid) {
                $validator->errors()->add('current_password', 'Le mot de passe actuel est erroné');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        if (Auth::guard('admins')->check()) {
            Auth::guard('admins')->user()->update(['password' => Hash::make($request->password)]);
        }

        if (Auth::guard('students')->check()) {
            Auth::guard('students')->user()->update(['password' => Hash::make($request->password)]);
        }
        if (Auth::guard('enseignants')->check()) {
            Auth::guard('enseignants')->user()->update(['password' => Hash::make($request->password)]);
        }

        return redirect()->back()->with('success', 'Le mot de passe a été changé avec succès');
    }
}
