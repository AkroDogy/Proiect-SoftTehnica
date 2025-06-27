<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formular extends Model
{
    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'description', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
