<?php

namespace App\Transformers;


use App\Address;
use App\Customer;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{

    protected $availableIncludes = ['notes', 'contacts', 'projects'];

    protected $defaultIncludes = ['address'];

    public function transform (Customer $customer)
    {
        $fullName = $customer->firstName.' '.$customer->lastName;

        return [
            'id' => (int) $customer->id,
            'firstName' => (string) $customer->firstName,
            'lastName' => (string) $customer->lastName,
            'fullName' => (string) $fullName,
            'fieldName' => (string) $fullName,
            'primaryPhone' => $customer->primaryPhone,
            'primaryEmail' => $customer->primaryEmail,
            'created' => $customer->created_at->toFormattedDateString(),
            'updated' => $customer->updated_at->toFormattedDateString(),
            'links' => [
                'uri' => '/customers/'.$customer->id
            ]
        ];
    }

    public function includeNotes (Customer $customer)
    {
        $notes = $customer->notes;

        return $this->collection($notes, new NoteTransformer());
    }

    public function includeContacts (Customer $customer)
    {
        $contacts = $customer->contacts;

        return $this->collection($contacts, new ContactTransformer());
    }

    public function includeAddress (Customer $customer)
    {
        $address = $customer->address === null ? new Address() : $customer->address;

        return $this->item($address, new AddressTransformer());
    }

    public function includeProjects (Customer $customer)
    {
        $projects = $customer->projects;

        return $this->collection($projects, new ProjectTransformer());
    }

}