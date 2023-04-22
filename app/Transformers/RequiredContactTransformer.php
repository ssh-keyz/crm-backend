<?php
/**
 * Created by PhpStorm.
 * User: tyla
 * Date: 5/23/17
 * Time: 12:23 PM
 */

namespace App\Transformers;


use App\RequiredContact;
use League\Fractal\TransformerAbstract;

class RequiredContactTransformer extends TransformerAbstract
{
    public function transform (RequiredContact $requiredContact)
    {
        return [
            'id' => (int) $requiredContact->id,
            'required_contact' => (bool) $requiredContact->required_contact
        ];
    }
}