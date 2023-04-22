<?php
/**
 * Created by PhpStorm.
 * User: tyla
 * Date: 5/25/17
 * Time: 10:23 PM
 */

namespace App\Transformers;


use App\CalendarEvent;
use League\Fractal\TransformerAbstract;

class CalendarEventTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['notes', 'contacts', 'customer', 'project'];

    public function transform (CalendarEvent $calendarEvent)
    {
        return [
            'id' => $calendarEvent->id,
            'start' => $calendarEvent->start,
            'end' => $calendarEvent->end,
            'allDay' => $calendarEvent->allDay,
            'color' => $calendarEvent->color,
            'title' => $calendarEvent->title
        ];
    }

    public function includeNotes (CalendarEvent $calendarEvent)
    {
        $notes = $calendarEvent->notes;

        return $this->collection($notes, new NoteTransformer());
    }

    public function includeContacts (CalendarEvent $calendarEvent)
    {
        $contacts = $calendarEvent->contacts;

        return $this->collection($contacts, new ContactTransformer());
    }

    public function includeCustomer (CalendarEvent $calendarEvent)
    {
        $customer = $calendarEvent->project->customer;

        return $this->item($customer, new CustomerTransformer());
    }

    public function includeProject (CalendarEvent $calendarEvent)
    {
        $project = $calendarEvent->project;

        return $this->item($project, new ProjectTransformer());
    }
}