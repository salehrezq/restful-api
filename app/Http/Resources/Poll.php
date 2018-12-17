<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Poll extends JsonResource
{
    /**
     * Return an array that contains a substring of the
     * title up to 5 characters appended with ellipses.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => mb_strimwidth($this->title, 0, 5, '...')
        ];
    }
}
