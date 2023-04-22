<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequiredContact extends Model
{
    protected $fillable = [
        'required_contact'
    ];

    protected $touches = ['project'];

    public function requiredContactable()
    {
        return $this->morphTo();
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }


}
