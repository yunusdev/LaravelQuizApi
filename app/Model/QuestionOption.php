<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    //
    public function question(){

        return $this->belongsTo(Question::class);

    }
}
