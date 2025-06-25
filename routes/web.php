<?php

use Illuminate\Support\Facades\Route;
use App\Models\Test;
use App\Models\Formular;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert-model', function () {
    // 10 rand cuvinte in db apelant functia de get
    for ($i = 0; $i < 10; $i++) {
        Test::create(['test_var' => Str::random(10)]);
    }
    return redirect('/display-model')->with('success', '10 random words have been added to the database');
});

Route::get('/display-model', function () {
    //return toate elem din Test Model
    $tests = Test::all();
    return view('display', ['tests' => $tests]);
});

Route::get('/formular', function () {
    $formulare = Formular::all();
    return view('formular', ['formulare' => $formulare]);
});

Route::post('/formular', function (Request $request) {
    Formular::create($request->all());
    return redirect('/formular')->with('success', 'All data has been added');
});