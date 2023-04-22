<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $fillable = [
        'start', 'end', 'allDay', 'color', 'title', 'project_id'
    ];

    protected $touches = ['project'];

    public function notes ()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function project ()
    {
        return $this->belongsTo(Project::class);
    }

    public function contacts ()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }
}
