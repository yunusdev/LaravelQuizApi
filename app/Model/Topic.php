<?php

namespace App\Model;

//use Illuminate\Database\Eloquent\Model;

use App\User;

class Topic extends Model
{
    //

    public function questions(){

        return $this->hasMany(Question::class);

    }
}
