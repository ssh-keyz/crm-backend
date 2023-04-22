<?php
/**
 * Created by PhpStorm.
 * User: tyla
 * Date: 5/23/17
 * Time: 12:23 PM
 */

namespace App\Transformers;


use App\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{
    public function transform (Contact $contact)
    {
        return [
            'id' => (int) $contact->id,
            'name' => $contact->name,
            'role' => $contact->role,
            'phoneNumber' => $contact->phone_number,
            'email' => $contact->email,
            'links' => [
                'uri' => '/contacts/'.$contact->id
            ]
        ];
    }
}