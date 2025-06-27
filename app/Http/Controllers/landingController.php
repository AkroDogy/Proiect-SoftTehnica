<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class landingController
{
    public function index()
    {
        $user = Auth::user();
        return view('landing', compact('user'));
    }

    public function setAdmin()
    {
        $user = Auth::user();
        if ($user->role !== 'admin') {
            $user->role = 'admin';
            $msg = 'User role updated to admin.';
        } else {
            $user->role = 'user';
            $msg = 'User role updated to user.';
        }
        $user->save();
        return redirect()->back()->with('success', $msg);
    }

}