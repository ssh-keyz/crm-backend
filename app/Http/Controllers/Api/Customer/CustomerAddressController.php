<?php

namespace App\Http\Controllers\Api\Customer;

use App\Address;
use App\Customer;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomerAddressController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function index(Customer $customer)
    {
        $resource = $this->transform($customer->address)->toArray();

        return response($resource['data']);
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
        $address = $customer->address()->create($request->all());

        $resource = $this->transform($address)->toArray();

        return response($resource['data']);
    }

    /**
     * Display the specified resource.
     *
     * @param Customer $customer
     * @param Address $address
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Customer $customer, Address $address)
    {
        $resource = $this->transform($address)->toArray();

        return response($resource['data']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Customer $customer
     * @param Address $address
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Customer $customer, Address $address)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Customer $customer
     * @param Address $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer, Address $address)
    {
        $address->update($request->all());

        $resource = $this->transform($address)->toArray();

        return response($resource['data']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Customer $customer
     * @param Address $address
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Customer $customer, Address $address)
    {
        //
    }
}
