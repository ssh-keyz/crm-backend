<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectMilestone extends Model
{
    protected $fillable = [
        'name'
    ];

    public function projects ()
    {
        return $this->hasMany(Project::class);
    }

    public function projectMilestoneSteps ()
    {
        return $this->hasMany(ProjectMilestoneStep::class);
    }

}
