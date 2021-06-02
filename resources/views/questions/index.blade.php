@extends('templates.main')
@include('user.index')
@section('content')
<div class="row">
    <div class="col-md-12 justify-content-center">
        <div class="card shadow mt-4 mb-4">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h4 class="text-dark">All Questions</h4>
                    <a href="{{ route('questions.create') }}" class="btn btn-outline-primary">Create Question</a>
                </div>
            </div>
            <div class="card-body">
                @include('partials.alert')
                @if(count($questions))
                    @foreach ($questions as $question)
                        <div class="card">
                            <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h5 class="mt-0"><a href="{{ $question->url }}">{{ $question->new_title }}</a></h5>
                                        </div>
                                        <div class="col-md-4">
                                                @can('update-question',$question)
                                                    <a href="{{ route('questions.edit',$question->id) }}" class="btn btn-outline-danger btn-sm">Edit</a>
                                                @endcan
                                                @can('delete-question',$question)
                                                    <form action="{{ route('questions.destroy',$question->id) }}" method="post" class="form-delete">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-outline-info btn-sm">Delete</button>
                                                    </form>
                                                @endcan
                                        </div>
                                    </div>
                                    <p class="lead">
                                        Asked By <a href="{{ $question->user->url }}" class="text-danger"> {{$question->user->name}}</a>
                                        <small class="text-success" style="font-size: 16px;"> {{ $question->created_date }} </small>
                                    </p>
                                    <p style="color: maroon;">{{strip_tags(Str::limit($question->body, 200)) }}</p>
                                    <p class="text-primary mt-3"><a href="{{ $question->url }}">Read More Question</a></p>
                            </div>
                            <div class="d-flex flex-row counters justify-content-center mb-2">
                                <div class="vote ml-4 pb-2">
                                    <strong>{{ $question->votes_count }}</strong> <em>{{ Str::plural('vote', $question->votes_count) }}</em>
                                </div>
                                <div class="status {{ $question->status }} ml-4">
                                    <strong>{{ $question->answers_count }}</strong> <em class="ml-2 mr-2">{{ Str::plural('answer', $question->answers_count) }}</em>
                                </div>
                                <div class="view ml-4 pb-2">
                                    <strong>{{ $question->views }}</strong> <em>{{Str::plural('view', $question->views) }}</em>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                <div class="justify-content-center mt-4">
                    {{$questions->links()}}
                </div>
                @else
                    <p class="text-muted text-center">Questions not found</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
