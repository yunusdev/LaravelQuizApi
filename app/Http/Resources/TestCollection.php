<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TestCollection extends Resource
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
            'score' => $this->result . ' / ' . $this->topic->questions->count(),
            'created_at' => (string) $this->created_at,
            'topic' => (string) $this->topic->title,
            'topic_id' =>  $this->topic->id,
            'user_id' =>  $this->user_id,
            'test_answers' => $this->testAns(),
            'links' => [

                [
                    'rel' => 'self',
                    'href' => route('testResult', [$this->topic->slug, $this->id])
                ],

                [
                    'rel' => 'Results in Topic',
                    'href' => route('topicResults', [$this->topic->slug])
                ],

                [
                    'rel' => 'All Results',
                    'href' => route('allResults')
                ],

            ]


        ];
    }
}
