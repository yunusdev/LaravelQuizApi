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

//Take a Test

Route::post('/topic/{slug}/test', 'TestController@takeTest');

Route::group(['middleware' => 'auth:api'], function() {

    Route::get('logout', 'AuthController@logout');

    Route::get('user', 'AuthController@user')->name('user');

    Route::apiResource('/topic', 'TopicController');

    Route::apiResource('topic/{slug}/questions', 'QuestionController');

    Route::get('all/questions', 'QuestionController@allQuestions');

    Route::apiResource('question/{question}/question_options', 'QuestionOptionController');

    Route::get('/topic/{slug}/result/{test}', 'TestController@testResult')->name('testResult');

    Route::get('/topic/{slug}/results', 'TestController@topicResults')->name('topicResults');

    Route::get('/user/results', 'TestController@authUserResults')->name('authUserResults');

    Route::get('/all/results', 'TestController@allResults')->name('allResults');



});

Route::get('/test', 'TestController@test');




