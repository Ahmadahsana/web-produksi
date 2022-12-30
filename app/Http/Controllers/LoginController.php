<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credential = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);





        $User = User::where('username', $request->username)->first();

        if ($User) {
            if ($User->status_user_id == '0') {
                return back()->with('loginError', 'Login gagal !');
            } else if ($User->status_user_id == '1') {
                if (Auth::attempt($credential)) {
                    // dd('belum');
                    $request->session()->regenerate();
                    return redirect()->intended('/');
                }
            }
        } else {
            return redirect('/login')->with('loginError', 'Anda tidak terdaftar!! silahkan daftar dahulu !!');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
