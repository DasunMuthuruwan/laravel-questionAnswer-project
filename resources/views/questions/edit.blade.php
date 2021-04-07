@extends('templates.main')
@include('user.index')
@section('content')
<div class="col-md-8 offset-md-1 justify-content-center">
    <div class="card border border-success mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="text-info">Edit Question</h4>
                <a href="{{ route('questions.index') }}" class="btn btn-outline-danger">Back to all questions</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.update',$question) }}" method="post">
                @method('PUT')
                @include('questions.form',['buttonTitle' => 'Update Question'])
            </form>
        </div>
    </div>
</div>
@endsection
