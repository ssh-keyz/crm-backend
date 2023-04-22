<?php

namespace App\Http\Controllers\Api\Project;

use App\Contact;
use App\Http\Controllers\Api\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        $resource = $this->transform($project->contacts)->toArray();

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
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $contact = $project->contacts()->create($request->all());

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project, Contact $contact)
    {
        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
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
     * @param Project $project
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, Contact $contact)
    {
        $contact->update($request->all());

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
