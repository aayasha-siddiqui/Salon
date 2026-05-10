<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }
public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    if (auth()->attempt($credentials)) {

        $request->session()->regenerate();

        // 👑 Salon Admin
        if ($request->email === 'admin@gmail.com') {
            return redirect('/salon/dashboard');
        }

        // 🎓 Academy
        return redirect('/admin/dashboard');
    }

    return back()->withErrors([
        'email' => 'Invalid credentials'
    ]);
}

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
