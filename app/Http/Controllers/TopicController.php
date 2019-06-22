<?php

namespace App\Http\Controllers;

use App\Http\Resources\TopicCollection;
use App\Http\Resources\TopicResource;
use App\Model\Topic;
use App\Traits\ApiResponser;
use App\User;
use Illuminate\Http\Request;

class TopicController extends Controller
{

    use ApiResponser;

    public function __construct(){

//        $this->middleware('is_admin')->only('store', 'update', 'delete');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){

        $topics = Topic::latest()->get();

        $topic_col =  TopicCollection::collection($topics);

        return $this->showAll($topic_col);

    }

    public function store(Request $request)
    {
        //

        $this->validate($request, [

           'title' => 'required|unique:topics'

        ]);

        $topic = new Topic;

        $topic->title = $request->title;
        $topic->slug = str_slug($request->title);

        $topic->save();

        $topic_res = new TopicResource($topic);

        return $this->showOne($topic_res, 201);

    }


    public function show(Topic $topic)
    {

        $topic_res = new TopicResource($topic);

        return $this->showOne($topic_res, 201);
    }

    public function update(Request $request, Topic $topic)
    {
        //

        $this->validate($request, [

            'title' => 'required'

        ]);

        $topic->title = $request->title;

        $topic->slug = str_slug($request->title);

        if ($topic->isClean()) {
            return $this->errorResponse('You need to make a change before updating a topic', 422);
        }

        $topic->save();

        $topic_res = new TopicResource($topic);

        return $this->showOne($topic_res, 201);
    }

    public function destroy(Topic $topic)
    {
        $topic->delete();

        return $this->showOne($topic);
    }
}
