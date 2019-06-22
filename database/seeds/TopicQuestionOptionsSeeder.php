<?php

use App\Model\QuestionOption;
use Illuminate\Database\Seeder;

class TopicQuestionOptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        \DB::table('social_providers')->delete();
        \DB::table('users')->delete();
        \DB::table('topics')->delete();
        \DB::table('questions')->delete();
        \DB::table('question_options')->delete();

        factory(\App\User::class, 5)->create();

        factory(\App\Model\Topic::class, 10)->create()->each(function ($topic){

            $topic->questions()->saveMany(factory(\App\Model\Question::class, rand(5, 10))->make())->each(function ($question){

                $question->questionOptions()->saveMany(factory(\App\Model\QuestionOption::class, 4)->make());


            });

        });


        $questions = \App\Model\Question::all();


        foreach($questions as $question){

            $option_id = $question->questionOptions->random()->id;

            $option = QuestionOption::find($option_id);

            $option->isCorrect = 1;

            $option->save();
        }

    }
}
