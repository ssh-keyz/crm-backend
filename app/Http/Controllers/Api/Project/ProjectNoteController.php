<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Api\Controller;
use App\Note;
use App\Project;
use Illuminate\Http\Request;

class ProjectNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param project $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $project->touch();
        $project->notes()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Project $project, Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Project $project
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Project $project, Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Project $project, Note $note)
    {
        $note->update($request->all());

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Note $note)
    {
        //
    }
}
