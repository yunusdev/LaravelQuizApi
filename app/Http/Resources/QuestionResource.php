<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
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
            'answer_explanation' => $this->answer_explanation,
            'topic' =>  (string) $this->topic->title,
            'created_at' => (string) $this->created_at,
            'question_options_count' => $this->questionOptions->count(),
            'question_options' => $this->questionOptions,
            'links' => [

                [
                    'rel' => 'self',
                    'href' => route('questions.show', [$this->topic->slug, $this->id])
                ],
                [
                    'rel' => 'topic',
                    'href' => route('topic.show', $this->topic->id)
                ],
                [
                    'rel' => 'questions.options',
                    'href' => route('question_options.index', $this->id),
                ],


            ]
        ];
    }
}
