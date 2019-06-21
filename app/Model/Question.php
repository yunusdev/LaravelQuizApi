<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //

    public function topic(){

        return $this->belongsTo(Topic::class);

    }

    public function questionOptions(){

        return $this->hasMany(QuestionOption::class);

    }
}
