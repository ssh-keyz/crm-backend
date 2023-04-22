<?php

namespace App\Listeners\Project;


use App\Events\Project\ProjectCreating as ProjectCreatingEvent;
use App\ProjectMilestone;
use App\ProjectStatus;

class ProjectCreating
{

    public $status;

    public $milestone;

    /**
     * Create the event listener.
     *
     * @param ProjectStatus $projectStatus
     * @param ProjectMilestone $projectMilestone
     */
    public function __construct(ProjectStatus $projectStatus, ProjectMilestone $projectMilestone)
    {
        $this->status = $projectStatus;
        $this->milestone = $projectMilestone;
    }

    /**
     * Handle the event.
     *
     * @param  ProjectCreatingEvent  $event
     * @return void
     */
    public function handle(ProjectCreatingEvent $event)
    {
        $this->setProjectStatus($event);

        $this->setProjectMilestone($event);
    }

    public function setProjectStatus (ProjectCreatingEvent &$event)
    {
        $activeProjectStatus = $this->status->where('name', 'Active')->first();

        $event->project->project_status_id = $activeProjectStatus->id;
    }

    public function setProjectMilestone (ProjectCreatingEvent &$event)
    {
        $designMilestone = $this->milestone->where('id', '1')->first();

        $fabDrawingStep = $designMilestone->projectMilestoneSteps->where('id', '1')->first();

        $event->project->project_milestone_id = $designMilestone->id;

        $event->project->project_milestone_step_id = $fabDrawingStep->id;
    }
}