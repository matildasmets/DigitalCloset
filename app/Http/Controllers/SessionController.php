<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            $user = Auth::user();
            $request->session()->put('user_id', $user->id);
            $request->session()->put('first_name', $user->first_name);
            $request->session()->put('last_name', $user->last_name);

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email' => 'E-mail or password is incorrect.',
        ])->withInput();
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
