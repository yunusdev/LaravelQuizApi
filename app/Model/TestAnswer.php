<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{

    public function topic(){

        return $this->belongsTo(Topic::class);

    }

    public function question(){

        return $this->belongsTo(Question::class);

    }
}
