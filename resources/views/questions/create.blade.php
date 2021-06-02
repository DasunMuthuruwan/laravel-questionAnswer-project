@extends('templates.main')
@include('user.index')
@section('content')
<div class="col-md-8 offset-md-2 justify-content-center">
    <div class="card shadow mt-4 mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="text-info">Ask Question</h4>
                <a href="{{ route('questions.index') }}" class="btn btn-outline-danger">Back to all questions</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store') }}" method="post">
                @include('questions.form',['buttonTitle' => 'Submit Question'])
            </form>
        </div>
    </div>
</div>
@endsection
