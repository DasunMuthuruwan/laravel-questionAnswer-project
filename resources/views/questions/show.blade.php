@extends('templates.main')
@include('user.index')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 justify-content-center">
        <div class="card border border-success mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="text-info">{{ $question->title }}</h4>
                    <a href="{{ route('questions.index') }}" class="btn btn-outline-danger">Back to all questions</a>
                </div>
            </div>
            <div class="card-body">
                {{ $question->body }}
                <hr>
                <div class="text-center">
                    <span class="text-muted">Question {{ $question->created_date }}</span>
                    <div class="media mt-2">
                        <a href="{{ $question->user->url }}" class="pr-2">
                            <img src="{{ $question->user->avatar }}" alt="">
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
<div class="row">
    <div class="col-md-12">
        <div class="card border border-success mb-4"">
            <div class="card-header">
                <h2>{{ $question->answers_count . " " . Str::plural('Answer', $question->answers_count) }}</h2>
            </div>
            <div class="card-body">
                @foreach ($question->answers as $answer)
                    <p class="mt-2">{{ $answer->body }}</p>
                    <div class="text-center">
                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                        <div class="media mt-2">
                            <a href="{{ $answer->user->url }}" class="pr-2">
                                <img src="{{ $answer->user->avatar }}" alt="">
                            </a>
                            <div class="media-body">
                               <a href="{{ $answer->user->url }}"> <small>{{$answer->user->name}}</small></a>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
