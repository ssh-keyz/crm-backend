<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMilestoneStep extends Model
{
    protected $fillable = [
        'name'
    ];

    public function ProjectMilestone ()
    {
        return $this->belongsTo(ProjectMilestone::class);
    }
}
