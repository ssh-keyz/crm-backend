<?php

namespace App\Http\Controllers\Api\Customer;

use App\Customer;
use App\Http\Controllers\Api\Controller;
use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerNoteController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $resource = $this->transform($customer->notes)->toArray();

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
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Customer $customer)
    {
        $customer->touch();
        $note = $customer->notes()->create($request->all());

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Customer $customer, Note $note)
    {
        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @param Note $note
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Customer $customer, Note $note)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Customer $customer
     * @param Note $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Note $note)
    {
        $customer->touch();
        $note->update($request->all());

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }

    /**l
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @param Note $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer, Note $note)
    {
        $note->delete();

        $resource = $this->transform($note)->toArray();

        return response($resource['data']);
    }
}
