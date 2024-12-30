<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function signin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user(); // Get the authenticated user
            $request->session()->put('user_id', $user->id);
            $request->session()->put('first_name', $user->first_name);
            $request->session()->put('last_name', $user->last_name);

            return redirect()->intended('dashboard');
        }

        // If authentication fails
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }

    public function signup(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'string',
                'min:6',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*?&#]/'  // must contain a special character
            ],
            'repeat_password' => 'required|same:password'
        ], [
            'first_name.required' => 'The first name is required.',
            'last_name.required' => 'The last name is required.',
            'email.required' => 'The email is required.',
            'email.email' => 'The email must be a valid email address.',
            'email.unique' => 'This email has already been taken.',
            'password.required' => 'The password is required.',
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, and one special character.',
            'repeat_password.required' => 'The password confirmation is required.',
            'repeat_password.same' => 'The password confirmation does not match the password.',
        ]);

        unset($validatedData['repeat_password']);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::create($validatedData);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended('dashboard');
    }
}
