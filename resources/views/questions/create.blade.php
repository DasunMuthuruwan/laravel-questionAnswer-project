@extends('templates.main')
@include('user.index')
@section('content')
<div class="col-md-8 offset-md-1 justify-content-center">
    <div class="card border border-success mb-4">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h4 class="text-info">Ask Question</h4>
                <a href="{{ route('questions.index') }}" class="btn btn-outline-danger">Back to all questions</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('questions.store') }}" method="post">
                @csrf
                <div class="form-group mt-2">
                    <label for="title">Question Title</label>
                    <input type="text"
                     name="title"
                     class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
                     placeholder="please enter title"
                     value="{{ old('title') }}">
                     @if($errors->has('title'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                     @endif
                </div>
                <div class="form-group mt-2">
                    <label for="body">Explain Your Question</label>
                    <textarea name="body"
                     class="form-control {{ $errors->has('body') ? 'is-invalid':'' }}"
                     cols="30" rows="10"
                     >{{ old('body') }}</textarea>
                     @if($errors->has('body'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('body') }}</strong>
                        </span>
                     @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="submit" value="Ask this question" class="btn btn-outline-primary">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
