<?php

namespace Database\Seeders;

use App\Models\Answer;
use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VotablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //reset votables table for Question Model
        DB::table('votables')->delete();
        //get collection of users
        $users = User::all();
        //get count of users
        $numberOfUsers = $users->count();
        $votes = [-1, 1]; //votesUp = 1, votesDown = -1;
        //add votes the question atleast by one user
        foreach(Question::all() as $question){
            for($i=0; $i < rand(1, $numberOfUsers); $i++){
                $user = $users[$i];
                $user->voteQuestion($question, $votes[rand(0,1)]);
            }
        }

        foreach(Answer::all() as $answer){
            for($i=1; $i<rand(1,$numberOfUsers); $i++){
                $user = $users[$i];
                $user->voteAnswer($answer, $votes[rand(0,1)]);
            }
        }
    }
}
