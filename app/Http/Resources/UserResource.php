<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
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
                        'rel' => 'User Quiz Results',
                        'quiz_counts' => $this->tests->count(),
                        'href' => route('authUserResults')
                    ],

            ]
        ];
    }
}
