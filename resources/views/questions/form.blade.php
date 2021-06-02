@csrf
<div class="form-group mt-2">
    <label for="title" class="text-success"><b>Question Title</b></label>
    <input type="text"
        name="title"
        class="form-control mt-3 {{ $errors->has('title') ? 'is-invalid':'' }}"
        placeholder="Please Enter Question Title"
        value="{{ old('title',$question->title) }}">
        @if($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
</div>
<div class="form-group mt-2">
    <label for="body" class="text-success"><b>Explain Your Question</b></label>
    <textarea name="body"
        class="form-control mt-3 {{ $errors->has('body') ? 'is-invalid':'' }}"
        cols="30" rows="10"
        placeholder="Enter Your Question"
        >{{ old('body',$question->body) }}</textarea>
        @if($errors->has('body'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('body') }}</strong>
        </span>
        @enderror
</div>
<div class="form-group mt-2">
    <input type="submit" value="{{ $buttonTitle }}" class="btn btn-outline-primary">
</div>
