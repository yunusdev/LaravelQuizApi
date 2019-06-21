<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class QuestionOptionsCollection extends Resource
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
            'isCorrect' => $this->isCorrect  == 1 ? 'Correct' : 'InCorrect',
            'created_at' => (string) $this->created_at,
            'question' => $this->question,
            'links' => [
                [
                    'rel' => 'topic',
                    'href' => route('topic.show', $this->question->topic->id)
                ],
                [
                    'rel' => 'question.show',
                    'href' => route('questions.show', [$this->question->topic->slug, $this->question->id]),
                ],


            ]
        ];
    }
}
