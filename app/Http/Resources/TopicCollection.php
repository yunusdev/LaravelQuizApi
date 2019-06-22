<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TopicCollection extends Resource
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
                    'rel' => 'Topic Questions',
                    'href' => route('questions.index', $this->slug),
                ],


            ]
        ];
    }
}
