<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Test;

class admininsertController
{
    public function insert()
    {
        for ($i = 0; $i < 10; $i++) {
            Test::create(['test_var' => Str::random(10)]);
        }
        return 'Used admin privileges to insert 10 random texts in db.';
    }
    public function display()
    {
        $tests = Test::all();
        return view('insert.insert', compact('tests'));
    }
}
