<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerAcceptController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Answer $answer)
    {
        // dd($answer->question);
        $this->authorize('accept', $answer);

        $answer->question->acceptBestAnswer($answer);

        return back();
    }
}
