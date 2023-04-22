<?php

namespace App\Http\Controllers\Api\Project;

use App\CalendarEvent;
use App\Contact;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectEventContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param CalendarEvent $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function index(CalendarEvent $calendarEvent)
    {
        $contacts = $calendarEvent->contacts;

        $resource = $this->transform($contacts)->toArray();

        return response($resource);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CalendarEvent $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CalendarEvent $calendarEvent)
    {
        $contact = $calendarEvent->contacts()->create($request->all());

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param CalendarEvent $event
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(CalendarEvent $event, Contact $contact)
    {
        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CalendarEvent $event
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CalendarEvent $event, Contact $contact)
    {
        $contact->update($request->all());

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CalendarEvent $event
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarEvent $event, Contact $contact)
    {
        $contact->delete();

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }
}
