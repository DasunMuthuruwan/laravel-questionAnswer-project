<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class VoteQuestionController extends Controller
{
    //
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function __invoke(Question $question)
    {
        $vote = (int) request()->vote;

        Auth::user()->voteQuestion($question, $vote);

        return back();
    }
}
