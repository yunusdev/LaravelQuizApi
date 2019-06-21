<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->slug,
            'created_at' => (string)$this->created_at,
            'questions_count' => $this->questions->count(),
            'links' => [

                [
                    'rel' => 'self',
                    'href' => route('topic.show', $this->id)
                ],
                [
                    'rel' => 'talk.questions',
                    'href' => route('questions.index', $this->slug),
                ],


            ]
        ];
    }
}
