<?php
/**
 * Created by PhpStorm.
 * User: tyla
 * Date: 5/23/17
 * Time: 12:29 PM
 */

namespace App\Transformers;


use App\CalendarEvent;
use App\Contact;
use App\Customer;
use App\Note;
use App\Project;
//use App\RequiredContact;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use League\Fractal\TransformerAbstract;

class ProjectTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'contacts', 'customer', 'notes', 'events'
    ];

    public function transform (Project $project)
    {
        return [
            'id' => $project->id,
            'title' => $project->title,
            'fieldName' => $project->title,
            'status' => $project->status,
            'milestone' => $project->milestone,
            'step' => $project->currentStep,
            'product' => $project->product,
            'motionType' => $project->motion_type,
            'handing' => $project->handing,
            'opener' => $project->opener,
            'species' => $project->species,
            'finishType' => $project->finish_type,
            'glassSelection' => $project->glass_selection,
            'weatherStripping' => $project->weather_stripping,
            'color' => $project->color,
            'installRequired' => $project->install_required,
            'shippingRequired' => $project->shipping_required,
            'created' => $project->created_at->toFormattedDateString(),
            'updated' => $project->updated_at->toFormattedDateString(),
            'actionRequired' => $project->action_required,
            'project_status_id' => $project->project_status_id,
            'project_milestone_id' => $project->project_milestone_id,
            'cratingRequired' => $project->crating_required,
            'colorRequired' => $project->color_required,
            'moneyRequired' => $project->money_required,
            'serviceCallRequired' => $project->service_call_required,
            'scottRequired' => $project->scott_required
        ];
    }

    public function includeContacts (Project $project)
    {
        $contacts = $project->contacts === null ? new Collection(new Contact()) : $project->contacts;

        return $this->collection($contacts, new ContactTransformer());
    }

    public function includeNotes (Project $project)
    {
        $customer = $project->customer === null ? new Customer() : $project->customer;
        $events = $project->calendarEvents == null? new Collection() : $project->calendarEvents;

        $projectNotes = $project->notes === null ? new Collection(new Note()) : $project->notes;
        $customerNotes = $customer->notes;
        $eventNotes = [];

        $index = 0;
        foreach($events as $event){
            $eventNotes[$index] = $event->notes;
            $index++;
        }

        $notes = $projectNotes->merge($customerNotes);
        $notes = $notes->sortByDesc('id');
        return $this->collection($notes, new NoteTransformer());
    }

    public function includeCustomer (Project $project)
    {
        $customer = $project->customer === null ? new Customer() : $project->customer;

        return $this->item($customer, new CustomerTransformer());
    }

//    public function includeRequiredContact(Project $project)
//    {
//        $requiredContact = $project->requiredContact === null ? new RequiredContact() : $project->requiredContact;
//
//        return $this->item($requiredContact, new RequiredContactTransformer());
//    }

    public function includeEvents (Project $project)
    {
        $events = $project->calendarEvents === null ? new Collection(new CalendarEvent()) : $project->calendarEvents;

        return $this->collection($events, new CalendarEventTransformer());
    }

}
