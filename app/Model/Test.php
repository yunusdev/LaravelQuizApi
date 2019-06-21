<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    //

    public function topic(){

        return $this->belongsTo(Topic::class);

    }

    public function testAns(){

        $arr = [];

         foreach ($this->testAnswers as $ans){

            $object = (object) [

                'question_id' => $ans->question_id,
                'question' => $ans->question->title,
                'isCorrect' => $ans->isCorrect  == 1 ? 'Correct' : 'InCorrect',
                'answer_explanation' => $ans->question->answer_explanation

            ];

            array_push($arr, $object);

        }

        return $arr;

    }




    public function testAnswers(){

        return $this->hasMany(TestAnswer::class);

    }
}
