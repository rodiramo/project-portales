<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.form-login');
    }

    public function processLogin(Request $request)
    {
       
        $credentials = $request->only(['email', 'password']);

      
        if(!auth()->attempt($credentials)) {
            return back()
                ->with('message.error', 'The credentials provided dont match.');
        }

        $request->session()->regenerate();

        return redirect()
            ->route('news.index')
            ->with('message.success', 'Welcome Back!');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.formLogin')
            ->with('message.success', 'Successfully logged out!');
    }
}
