<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'title', 'content'
    ];

    protected $touches = ['project', 'customer'];

    public function noteable ()
    {
        return $this->morphTo();
    }

    public function project () {
        return $this->belongsTo('App\Project');
    }

    public function customer () {
        return $this->belongsTo('App\Customer');
    }

//    public function customer () {
//        return $this->belongsTo(Customer::class);
//    }
}
