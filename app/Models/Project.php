<?php

namespace App\Models;

use App\Events\Project\ProjectCreating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'customer_id',
        'product',
        'motion_type',
        'handing',
        'opener',
        'species',
        'finish_type',
        'glass_selection',
        'weather_stripping',
        'color',
        'install_required',
        'shipping_required',
        'action_required',
        'project_status_id',
        'project_milestone_id',
        'crating_required',
        'color_required',
        'money_required',
        'service_call_required',
        'scott_required'
    ];

    protected $dates = ['deleted_at'];

    protected $touches = ['customer'];

    protected $events = [
        'creating' => ProjectCreating::class
    ];

    public function getStatusAttribute()
    {
        return $this->projectStatus->name;
    }

    public function getMilestoneAttribute()
    {
        return $this->projectMilestone->name;
    }

    public function getCurrentStepAttribute()
    {
        return $this->projectMilestoneStep->name;
    }

    public function projectStatus()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function projectMilestone()
    {
        return $this->belongsTo(ProjectMilestone::class);
    }

    public function projectMilestoneStep()
    {
        return $this->belongsTo(ProjectMilestoneStep::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function notes()
    {

        return $this->morphMany(Note::class, 'noteable');
    }

    public function contacts()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function calendarEvents()
    {
        return $this->hasMany(CalendarEvent::class);
    }

//    public function requiredContact()
//    {
//        return $this->morphOne(RequiredContact::class, 'required_contactable');
//    }
}
