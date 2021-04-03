@extends('templates.main')
@include('user.index')
@section('content')
<div class="col-md-12 justify-content-center">
    <div class="card border border-success mb-4">
        <div class="p-2 bg-info text-white">
            <h4 class="text-dark text-center">All Questions</h4>
        </div>
        <div class="card-body">
            @foreach ($questions as $question)
                <div class="card border border-warning">
                    <div class="card-body">
                        <h5 class="text-info mt-0"><a href="{{ $question->url }}">{{ $question->new_title }}</a></h5>
                            <p class="lead">
                                Asked By <a href="{{ $question->user->url }}" class="text-success"> {{$question->user->name}}</a>
                                <small class="text-muted" style="font-size: 16px;"> {{ $question->created_date }} </small>
                            </p>
                            {{ Str::limit($question->body, 250) }}
                    </div>
                    <div class="d-flex flex-row counters justify-content-center mb-2">
                        <div class="vote ml-4 pb-2">
                            <strong>{{ $question->votes }}</strong> <em>{{ Str::plural('vote', $question->votes) }}</em>
                        </div>
                        <div class="status {{ $question->status }} ml-4 pb-2">
                            <strong>{{ $question->answers }}</strong> <em>{{ Str::plural('answers', $question->answers) }}</em>
                        </div>
                        <div class="view ml-4 pb-2">
                            <strong>{{ $question->views }}</strong> <em>{{Str::plural('views', $question->views) }}</em>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="text-center mt-4">
                {{$questions->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
