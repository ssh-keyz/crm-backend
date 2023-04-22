<?php
/**
 * Created by PhpStorm.
 * User: tyla
 * Date: 5/23/17
 * Time: 7:10 AM
 */

namespace App\Transformers;


use App\Note;
use League\Fractal\TransformerAbstract;

class NoteTransformer extends TransformerAbstract
{

    public function transform (Note $note)
    {
        return [
            'id' => (int) $note->id,
            'title' => (string) $note->title,
            'content' => $note->content
        ];
    }

}