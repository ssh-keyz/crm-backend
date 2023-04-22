<?php
/**
 * Created by PhpStorm.
 * User: tyla
 * Date: 5/23/17
 * Time: 7:14 PM
 */

namespace App\Transformers;


use App\Address;
use League\Fractal\TransformerAbstract;

class AddressTransformer extends TransformerAbstract
{

    public function transform (Address $address)
    {
        return [
            'id' => $address->id,
            'addressOne' => $address->address_one,
            'addressTwo' => (string) $address->address_two,
            'city' => $address->city,
            'state' => $address->state,
            'zip' => $address->zip,
            'created' => $address->created_at,
            'updated' => $address->updated_at
        ];
    }

}