<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::get('users', 'AuthController@allUsers');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'AuthController@user');

    Route::apiResource('/topic', 'TopicController');

    Route::get('all/questions', 'QuestionController@allQuestions');

    Route::apiResource('topic/{slug}/questions', 'QuestionController');

    Route::apiResource('question/{question}/question_options', 'QuestionOptionController');

});





