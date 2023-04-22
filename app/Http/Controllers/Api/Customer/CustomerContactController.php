<?php

namespace App\Http\Controllers\Api\Customer;

use App\Contact;
use App\Customer;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerContactController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $resource = $this->transform($customer->contacts)->toArray();

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
        $contact = $customer->contacts()->create($request->all());

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer, Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer, Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Customer $customer
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Contact $contact)
    {
        $contact->update($request->all());

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Customer $customer, Contact $contact)
    {
        $contact->delete();

        $resource = $this->transform($contact)->toArray();

        return response($resource['data']);
    }

}
