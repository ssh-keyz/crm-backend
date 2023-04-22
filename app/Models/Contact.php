<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name',
        'company',
        'role',
        'phone_number',
        'email'
    ];

//    protected $touches = ['customer'];


    public function contactable ()
    {
        return $this->morphTo();
    }
}
