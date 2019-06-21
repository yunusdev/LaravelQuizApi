<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionOptionResource extends JsonResource
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
            'isCorrect' => $this->isCorrect,
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
