@extends('templates.main')
@include('user.index')
@section('content')
<div class="row justify-content-center">
    <div class="card shadow col-md-10 offset-md-1">
        <div class="card-header">
            <h4 class="text-dark text-center">All Questions<h4>
        </div>
        <div class="card-body">
            @foreach ($questions as $question)
                <div class="media mt-3">
                    <div class="media-body">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="text-info mt-0">{{ $question->title }}</h6>
                                {{ Str::limit($question->body, 250) }}
                            </div>
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
