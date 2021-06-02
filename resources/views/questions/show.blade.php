@extends('templates.main')
@include('user.index')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12 justify-content-center">
            <div class="card shadow mb-4 mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h4 class=title">{{ $question->title }}</h4>
                        <a href="{{ route('questions.index') }}" class="btn btn-outline-danger">Back to all questions</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-row vote-controls">
                        @include('shared._vote',[
                            'model' => $question
                        ])
                        <p class="text-muted ml-4">{{$question->body}}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4"></div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            @include('shared._author',[
                                'model'=>$question,
                                'label'=>'Asked'
                            ])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('answers._index',[
        'answers' => $question->answers,
        'answerCount' => $question->answers_count
    ])

    @include('answers._create')
@endsection
