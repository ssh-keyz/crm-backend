<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'firstName',
        'lastName',
        'primaryPhone',
        'primaryEmail',
        'addressOne',
        'addressTwo',
        'city',
        'state',
        'zip'
    ];

    protected $dates = ['deleted_at'];

    public function getFullNameAttribute ()
    {
        return "${$this->attributes['firstName']} ${$this->attributes['lastName']}";
    }

    public function address ()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    public function contacts ()
    {
        return $this->morphMany(Contact::class, 'contactable');
    }

    public function notes ()
    {
        return $this->morphMany(Note::class, 'noteable');
    }

    public function projects ()
    {
        return $this->hasMany(Project::class);
    }

    public function getPrimaryPhoneAttribute ()
    {
        $contact = $this->contacts->last();

        return $contact ? $contact->phone_number : '';
    }

    public function setPrimaryPhoneAttribute ($newValue)
    {
        $contact = $this->contacts->last();

        $contact->phone_number = $newValue;

        $contact->save();
    }

    public function getPrimaryEmailAttribute ()
    {
        $contact = $this->contacts->last();

        return $contact ? $contact->email : '';
    }

    public function setPrimaryEmailAttribute ($newValue)
    {
        $contact = $this->contacts->last();

        $contact->email = $newValue;

        $contact->save();
    }

    public function setAddressOneAttribute ($address_one)
    {
        $this->address->update(compact('address_one'));
    }

    public function setAddressTwoAttribute ($address_two)
    {
        $this->address->update(compact('address_two'));
    }

    public function setCityAttribute ($city)
    {
        $this->address->update(compact('city'));
    }

    public function setStateAttribute ($state)
    {
        $this->address->update(compact('state'));
    }

    public function setZipAttribute ($zip)
    {
        $this->address->update(compact('zip'));
    }
}
