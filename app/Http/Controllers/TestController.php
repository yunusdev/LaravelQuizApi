<?php

namespace App\Http\Controllers;

use App\Http\Resources\TestCollection;
use App\Http\Resources\TestResource;
use App\Model\Question;
use App\Model\QuestionOption;
use App\Model\Test;
use App\Model\TestAnswer;
use App\Model\Topic;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use ApiResponser;

    public function takeTest(Request $request, $slug){

        $topic = Topic::where('slug', $slug)->first();

        $questions = Question::where('topic_id', $topic->id)->pluck('id');

        $options = Question::where('topic_id', $topic->id)->first()->questionOptions->pluck('id');

        $result = 0;

        $test = Test::create([
            'user_id' => auth('api')->id(),
            'topic_id'  => $topic->id,
            'result'  => $result,
        ]);

        foreach ($questions as $question) {

            $status = 0;

//            if (in_array($request->input('answers.'.$question), Question::find($request->input('answers.'.$question))->questionOptions->pluck('id'))){

                if ($request->input('answers.'.$question) != null
                    && QuestionOption::find($request->input('answers.'.$question))->isCorrect ){
                    $status = 1;
                    $result++;

                }
//            }else{
//
//                $test->delete();
//
//                return $this->errorResponse('An error occurred. Hint: check if all possible questions have an answer', 422);
//
//            }

            TestAnswer::create([
                'user_id'     => auth('api')->id(),
                'test_id'     => $test->id,
                'topic_id'     => $topic->id,
                'question_id' => $question,
                'question_option_id' => $request->input('answers.'.$question),
                'isCorrect'     => $status,
            ]);
        }

        $test->update(['result' => $result]);

        $test_res = new TestResource($test);

        return $this->showOne($test_res);

    }

    public function testResults($slug, Test $test){

        $topic = Topic::where('slug', $slug)->first();

        $test_res = new TestResource($test);

        return $this->showOne($test_res);

    }

    public function topicResults($slug){

        $topic = Topic::where('slug', $slug)->first();

        $test_col = TestCollection::collection($topic->tests);

        return $this->showAll($test_col);
    }

    public function allResults(){

        $tests = Test::all();

        $test_col = TestCollection::collection($tests);

        return $this->showAll($test_col);

    }
}
