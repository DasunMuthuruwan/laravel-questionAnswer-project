<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = User::pluck('id')->all();
        $userCount = count($users);

        foreach(Question::all() as $question){
            for($i=0; $i < rand(1, $userCount); $i++){
                $user = $users[$i];
                $question->favorites()->attach($user);
            }
        }
    }
}
