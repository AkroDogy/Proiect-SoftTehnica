<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Formular;
use Illuminate\Support\Facades\Auth;

class formularController
{
    public function formularPage()
    {
        $formulars = Formular::latest()->get();
        return view('formular.formular', compact('formulars'));
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
        Formular::create($request->all());
        return redirect('/formular')->with('success', 'Formular saved');
    }
}
