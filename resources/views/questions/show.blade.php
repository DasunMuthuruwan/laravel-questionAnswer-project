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
                        <span class="d-sm-block">
                            <a title="This question is useful" class="vote-up"><i class="fas fa-caret-up fa-3x"></i></a>
                            <span class="votes-count">123</span>
                            <a title="This question is not useful" class="vote-down off"><i class="fas fa-caret-down fa-3x"></i></a>
                            <a title="Click to mark as favorite question" class="favorite"><i class="fas fa-star fa-2x"></i></a>
                            <span class="favorite-count mt-2">123</span>
                        </span>
                        <p class="text-muted ml-4">{{$question->body}}</p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <span class="text-muted">Question {{ $question->created_date }}</span>
                        <div class="media mt-2">
                            <a href="{{ $question->user->url }}" class="pr-2">
                                <img src="{{ $question->user->avatar }}">
                            </a>
                            <div class="media-body">
                            <a href="{{ $question->user->url }}"> <small>{{$question->user->name}}</small></a>
                            </div>
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
@endsection
