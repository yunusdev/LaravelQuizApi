<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionResource;
use App\Http\Resources\QuestionsCollection;
use App\Model\Question;
use App\Model\Topic;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    //

    use ApiResponser;

    public function __construct(){

        $this->middleware('is_admin')->only('store', 'update', 'delete');

    }

    public function allQuestions(){


        $questions = Question::with('questionOptions')->inRandomOrder()->get();

        $questions_coll = QuestionsCollection::collection($questions);

        return $this->showAll($questions_coll);

    }

    public function index($slug){

    $topic = Topic::where('slug', $slug)->first();

    $questions = Question::where('topic_id', $topic->id)->with('questionOptions')->inRandomOrder()->get();

    $questions_coll = QuestionsCollection::collection($questions);

    return $this->showAll($questions_coll);

    }



    public function store(Request $request, $slug){

        $this->validate($request, [

            'title' => 'required',
            'answer_explanation' => 'required'

        ]);

        $topic = Topic::where('slug', $slug)->first();

        $question = new Question;

        $question->title = $request->title;
        $question->topic_id = $topic->id;
        $question->answer_explanation = $request->answer_explanation;

        $question->save();

        $question_res = new QuestionResource($question);

        return $this->showOne($question_res, 201);

    }

    public function show($slug, Question $question)
    {

        $question_res = new QuestionResource($question);

        return $this->showOne($question_res, 201);


    }

    public function update(Request $request, $slug, Question $question){


        $this->validate($request, [

            'title' => 'required',
            'answer_explanation' => 'required'

        ]);

        $topic = Topic::where('slug', $slug)->first();

        if ($request->title) {

            $question->title = $request->title;
        }
        $question->topic_id = $topic->id;

        if ($request->title) {
             $question->answer_explanation = $request->answer_explanation;
        }

        $question->save();

        $question_res = new QuestionResource($question);

        return $this->showOne($question_res, 201);


    }

    public function destroy($slug, Question $question){

        $question->delete();

        return $this->showOne($question);

    }

}
