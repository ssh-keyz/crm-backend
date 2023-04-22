<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = [
        'address_one',
        'address_two',
        'city',
        'state',
        'zip'
    ];

    public function addressable ()
    {
        return $this->morphTo();
    }

    public function customer () {
        return $this->belongsTo(Customer::class);
    }

}
