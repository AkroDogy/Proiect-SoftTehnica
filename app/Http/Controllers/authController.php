<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class authController
{
    public function registerPage()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'Name req.',
            'email.required' => 'Email req.',
            'email.email' => 'Email format invalid.',
            'email.unique' => 'Email already used.',
            'password.required' => 'Password req.',
            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Passwords do not match.',
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);
        return redirect('login')->with('success', 'Acc created');
    }

    public function loginPage()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return back()->withErrors([
                'email' => 'Incorrect data.'
            ])->withInput();
        }
        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return back()->withErrors([
                'password' => 'Incorrect data.',
            ])->withInput();
        }
        $request->session()->regenerate();
        return redirect('/');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
