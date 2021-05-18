<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
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
