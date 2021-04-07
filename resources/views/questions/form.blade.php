@csrf
<div class="form-group mt-2">
    <label for="title">Question Title</label>
    <input type="text"
        name="title"
        class="form-control {{ $errors->has('title') ? 'is-invalid':'' }}"
        placeholder="please enter title"
        value="{{ old('title',$question->title) }}">
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
