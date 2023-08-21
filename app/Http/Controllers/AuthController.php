<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (! empty(Auth::check())) {
            if (Auth::user()->user_type == 0) {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('student/dashboard');
            }
        }

        return view('auth.login');
    }

    public function AuthLogin(Request $request)
    {
        $remember = ! empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            if (Auth::user()->user_type == 0) {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('student/dashboard');
            }
        } else {
            return redirect()->back()->with('error', 'Please enter currect email and password');
        }
    }

    public function register()
    {
        if (! empty(Auth::check())) {
            if (Auth::user()->user_type == 0) {
                return redirect('admin/dashboard');
            } elseif (Auth::user()->user_type == 2) {
                return redirect('student/dashboard');
            }
        }

        return view('auth.register');
    }

    public function authRegister(Request $request)
    {
        $save = new User;
        $save->name = $request->first_name;
        $save->email = $request->email;
        $save->password = $request->password;
        $save->save();

        return redirect('login')->with('success', 'Akun telah dibuat');
    }

    public function logout()
    {
        Auth::logout();

        return redirect(url('/login'));
    }
}
