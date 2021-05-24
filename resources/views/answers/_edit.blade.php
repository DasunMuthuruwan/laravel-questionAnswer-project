@extends('templates.main')
@include('user.index')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header">
                <h2>Update Your Answer : <strong> {{ $question->title }} </strong></h3>
            </div>
            <div class="card-body">
                <form action="{{ route('questions.answers.update',[$question->id, $answer->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="answer_body">Answer Body</label>
                        <textarea rows="5" cols="6" name="body" class="form-control mt-4 {{ $errors->has('body') ? 'is-invalid':'' }}" mt-4">
                            {{ old('body', $answer->body) }}
                        </textarea>
                        @if($errors->has('body'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('body') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group mt-4">
                        <input type="submit" value="Update Answer" class="btn btn-outline-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
