<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectOption extends Model
{

    protected $fillable = [
        'name', 'description', 'selections'
    ];

}
