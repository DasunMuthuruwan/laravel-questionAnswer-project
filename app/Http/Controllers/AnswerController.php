<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerRequest;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Question;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth',['except'=>['index','show','create']]);
    // }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Question $question, AnswerRequest $request)
    {
        //store answer
        // return Auth::user()->id;
        $question->answers()->create($request->validated()
        +['user_id'=>Auth::user()->id]);

        $request->session()->flash('success','Answer created successfully');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question,Answer $answer)
    {
        //
        $this->authorize('update',$answer);

        return view('answers._edit',compact('question','answer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Question $question, AnswerRequest $request, Answer $answer)
    {
        //
        $this->authorize('update',$answer);

        $answer->update($request->validated());
        $request->session()->flash('success','Answer updated successfully');

        return redirect()->route('questions.show',$question->slug);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question, Answer $answer)
    {
        //
        $this->authorize('delete', $answer);

        $answer->delete();
        // $question->decrement('answers_count');
        return redirect()->route('questions.show',$question->slug)->with('success','Answer deleted successfully');

    }
}
