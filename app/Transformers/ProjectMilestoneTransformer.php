<?php

namespace App\Transformers;

use App\ProjectMilestone;
use League\Fractal\TransformerAbstract;

class ProjectMilestoneTransformer extends TransformerAbstract
{
    public function transform (ProjectMilestone $milestone)
    {
        return [
            'id' => (int) $milestone->id,
            'name' => (string) $milestone->name,
            'created' => $milestone->created_at->toFormattedDateString(),
            'updated' => $milestone->updated_at->toFormattedDateString()
        ];
    }
}