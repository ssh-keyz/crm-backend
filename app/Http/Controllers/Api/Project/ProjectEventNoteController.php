<?php

namespace App\Http\Controllers\Api\Project;

use App\CalendarEvent;
use App\Http\Controllers\Api\Controller;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProjectEventNoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param CalendarEvent $event
     * @return \Illuminate\Http\Response
     */
    public function index(CalendarEvent $event)
    {
        $notes = $event->notes;

        $resource = $this->transform($notes)->toArray();

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
        $note = $calendarEvent->notes()->create($request->all());

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param CalendarEvent $calendarEvent
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(CalendarEvent $calendarEvent, Note $note)
    {
        $resource = $this->transform($note)->toArray();

        return response($resource['dataa']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CalendarEvent $calendarEvent
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(CalendarEvent $calendarEvent, Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param CalendarEvent $event
     * @param Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eventId, $noteId)
    {
        $note = Note::where('id', $noteId)->first();

        $note->update($request->all());

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CalendarEvent $event
     * @param Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(CalendarEvent $event, $eventId, $noteId)
    {
        $note = Note::where('id', $noteId)->first();

        $note->delete();

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }
}
