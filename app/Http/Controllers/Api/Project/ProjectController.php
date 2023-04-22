<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Api\Controller;
use App\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all()->sortBy('title');

        $resource = $this->transform($projects, ['customer'])->toArray();

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $project = Project::create($request->all());

        $resource = $this->transform($project)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $resource = $this->transform($project, ['contacts', 'notes', 'events', 'customer'])->toArray();

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
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Project $project)
    {
        $project->update($request->all());

        $resource = $this->transform($project)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        $resource = $this->transform($project)->toArray();

        return response($resource['data']);
    }

//    public function destroy(Project $project)
//    {
//        $resource = $this->transform($project)->toArray();
//
//        return response($resource['data']);
//    }

}
