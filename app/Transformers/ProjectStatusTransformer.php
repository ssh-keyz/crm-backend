<?php

namespace App\Transformers;

use App\ProjectStatus;
use League\Fractal\TransformerAbstract;

class ProjectStatusTransformer extends TransformerAbstract
{
    public function transform (ProjectStatus $status)
    {
        return [
            'id' => (int) $status->id,
            'name' => (string) $status->name,
            'created' => $status->created_at->toFormattedDateString(),
            'updated' => $status->updated_at->toFormattedDateString()
        ];
    }
}