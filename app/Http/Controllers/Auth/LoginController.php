<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials  = $request->validate([
            'cin' => 'required|numeric',
            'password' => 'required'
        ]);

        if (Auth::guard('students')->attempt($credentials)) {
            return redirect()->route('meet.matieres.index');
        } else if (Auth::guard('admins')->attempt($credentials)) {
            return redirect()->route('statistic');
        } else if (Auth::guard('enseignants')->attempt($credentials)) {
            return redirect()->route('rapports');
        } else {
            return redirect()->route('login')
                ->with('error', "Le CIN ou le mot de passe est incorrect.");
        }
    }
}
