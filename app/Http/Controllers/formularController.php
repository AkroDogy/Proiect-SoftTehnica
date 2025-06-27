<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Formular;
use Illuminate\Support\Facades\Auth;

class formularController
{
    public function formularPage()
    {
        if (Auth::user()->role === 'admin') {
            $formulars = Formular::where('user_id', Auth::id())->latest()->get();
            $allforms = Formular::latest()->get();
            return view('formular.formular', compact('formulars', 'allforms'));
        } else {
            $formulars = Formular::where('user_id', Auth::id())->latest()->get();
            return view('formular.formular', compact('formulars'));
        }
    }
    public function formular(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email|',
            'phone' => 'required|string',
            'description' => 'required|string',
        ], [
            'firstname.required' => 'First name is required.',
            'lastname.required' => 'Last name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Email format is invalid.',
            'phone.string' => 'Phone must be a string.',
            'description.string' => 'Description must be a string.',
            'description.required' => 'Description is required.',
        ]);
        Formular::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'phone' => $request->phone,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);
        return redirect('/formular')->with('success', 'Formular saved');
    }
}
