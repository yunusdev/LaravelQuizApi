<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends Resource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image,
            'is_admin' => $this->is_admin == 1 ? 'Admin' : 'Not Admin',
            'created_at' => (string) $this->created_at,
            'links' => [

                [
                    'rel' => 'self',
                    'href' => route('user')
                ],

                [
                    'rel' => 'All User Tests Results',
                    'href' => route('authUserResults')
                ],

            ]

        ];
    }
}
