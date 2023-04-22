<?php

namespace App\Http\Controllers\Api\Project;

use App\CalendarEvent;
use App\Http\Controllers\Api\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectEventController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->fractalProjectEvents(CalendarEvent::all());
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = CalendarEvent::create($request->all());

        $resource = $this->transform($event)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param CalendarEvent $calendarEvent
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(CalendarEvent $calendarEvent)
    {
        $resource = $this->transform($calendarEvent, ['contacts', 'notes', 'project', 'customer'])->toArray();

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
     * @param CalendarEvent $calendarEvent
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, CalendarEvent $calendarEvent)
    {
        $calendarEvent->update($request->all());

        $resource = $this->transform($calendarEvent)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroyById($id)
    {
        $calendarEvent = CalendarEvent::find($id);

        $resource = $calendarEvent->delete();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @param CalendarEvent $calendarEvent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project, CalendarEvent $calendarEvent)
    {
        $calendarEvent->delete();

        $resource = $this->transform($calendarEvent)->toArray();

        return response($resource['data']);
    }

    public function fractalProjectEvents ($events)
    {
        $fractal = new \League\Fractal\Manager();
        $resource =  new \League\Fractal\Resource\Collection($events, function(CalendarEvent $event) {
            return [
                'id'      => (int) $event->id,
                'title'   => $event->title,
                'aria-label' => $event->project->title,
                'start' => $event->start,
                'end' => $event->end,
                'className' => [
                    'notification',
                    'is-paddingless',
                    'is-marginless',
                    'hint--top',
                    'hint--large',
                    'hint--info',
                    'is-info'
                ],
                'allDay' => $event->allDay,
                'color' => $event->color,
                'created' => $event->created_at->toFormattedDateString()
            ];
        });
        return $fractal->createData($resource)->toJson();
    }
}
