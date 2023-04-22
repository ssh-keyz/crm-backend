<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Api\Controller;
use App\Project;
use App\ProjectMilestone;
use Illuminate\Http\Request;

class ProjectMilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectMilestones = ProjectMilestone::all();

        $resource = $this->transform($projectMilestones)->toArray();

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $projectMilestone = ProjectMilestone::create($request->all());

        $resource = $this->transform($projectMilestone)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectMilestone $projectMilestone)
    {
        $resource = $this->transform($projectMilestone)->toArray();

        return response($resource['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectMilestone $projectMilestone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectMilestone $projectMilestone)
    {
        $projectMilestone->update($request->all());

        $resource = $this->transform($projectMilestone)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectMilestone  $projectMilestone
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectMilestone $projectMilestone)
    {
        $resource = $this->transform($projectMilestone)->toArray();

        return response($resource['data']);
    }
}
