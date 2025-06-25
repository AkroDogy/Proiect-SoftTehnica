<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formular extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'description'];
}
