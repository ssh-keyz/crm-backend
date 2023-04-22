<?php

namespace App\Http\Controllers\Api\Project;

use App\Http\Controllers\Api\Controller;
use App\Project;
use App\RequiredContact;
use Illuminate\Http\Request;

class RequiredContactController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Project $project)
    {
        $project->requiredContact()->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RequiredContact $requiredContact
     * @return \Illuminate\Http\Response
     */
    public function show(RequiredContact $requiredContact, RequiredContact $requiredContact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RequiredContact $requiredContact
     * @return \Illuminate\Http\Response
     */
    public function edit(RequiredContact $requiredContact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\RequiredContact $requiredContact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project, RequiredContact $requiredContact)
    {
        $requiredContact->update($request->all());

        $resource = $this->transform($requiredContact)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RequiredContact $requiredContact
     * @return \Illuminate\Http\Response
     */
    public function destroy(RequiredContact $requiredContact)
    {
        //
    }
}
