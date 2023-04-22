<?php

namespace App\Events\Project;


use App\Project;
use Illuminate\Queue\SerializesModels;

class ProjectCreating
{
    use SerializesModels;

    public $project;

    /**
     * Create a new event instance.
     *
     * @param Project $project
     * @internal param Order $order
     */
    public function __construct(Project $project)
    {
        $this->project = $project;
    }
}