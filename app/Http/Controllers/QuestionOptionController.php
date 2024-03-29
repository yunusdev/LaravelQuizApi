<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionOptionResource;
use App\Http\Resources\QuestionOptionsCollection;
use App\Model\Question;
use App\Model\QuestionOption;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class QuestionOptionController extends Controller
{
    //

    use ApiResponser;

    public function __construct(){

//        $this->middleware('is_admin')->only('store', 'update', 'delete');

    }

    public function index(Question $question){

        $question_options = QuestionOption::where('question_id', $question->id)->latest()->get();

        $options = QuestionOptionsCollection::collection($question_options);

        return $this->showAll($options);

    }

    public function store(Request $request, Question $question){

        $this->validate($request, [

            'option' => 'required',

        ]);

        $question_option = new QuestionOption;

        $question_option->option = $request->option;
        $question_option->question_id = $question->id;
        if ($request->isCorrect){

            $question_option->isCorrect = $request->isCorrect;

        }

        $question_option->save();

        $option = new QuestionOptionResource($question_option);

        return $this->showOne($option, 201);

    }

    public function update(Request $request, Question $question, QuestionOption $questionOption){


        $this->validate($request, [

            'option' => 'required',

        ]);


        if ($request->option) {

            $questionOption->option = $request->option;
        }

        $questionOption->question_id = $question->id;

        if ($request->isCorrect){

            $questionOption->isCorrect = $request->isCorrect;
        }

        $questionOption->save();

        $option = new QuestionOptionResource($questionOption);

        return $this->showOne($option, 201);

    }

    public function destroy(Question $question, QuestionOption $questionOption){

        $questionOption->delete();

        return $this->showOne($questionOption);

    }
}
