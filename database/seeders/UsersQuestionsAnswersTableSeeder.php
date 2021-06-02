<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('answers')->delete();
        DB::table('questions')->delete();
        DB::table('users')->delete();

        \App\Models\User::factory(3)->create()
            ->each(function($user){
                $user->questions()
                ->saveMany(\App\Models\Question::factory(rand(0,5))
                ->make()
                )
            ->each(function($question){
                $question->answers()
                ->saveMany(\App\Models\Answer::factory(rand(0,5))
                ->make()
                );
            });
        });
    }
}
