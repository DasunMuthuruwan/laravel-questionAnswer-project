<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header">
                <h2>{{ $answerCount . " " . Str::plural('Answer', $question->answers_count) }}</h2>
            </div>
            <div class="card-body">
                @include('partials.alert')
                @if(count($answers)>0)
                    @foreach ($answers as $answer)
                    <div class="d-flex flex-row vote-controls">
                        @include('shared._vote',[
                            'model' => $answer
                        ])
                        <p class="text-danger ml-4">{{ $answer->body }}</p>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                                @can('update',$answer)
                                    <a href="{{ route('questions.answers.edit',[$question->id, $answer->id]) }}" class="btn btn-outline-danger btn-sm">Edit</a>
                                @endcan
                                @can('delete',$answer)
                                    <form action="{{ route('questions.answers.destroy',[$question->id, $answer->id]) }}" method="post" class="form-delete">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-info btn-sm">Delete</button>
                                    </form>
                                @endcan
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-4">
                            @include('shared._author',[
                                'model' => $answer,
                                'label' => 'Answered'
                            ])
                        </div>
                    </div>
                    <hr>
                    @endforeach
                @else
                    <p class="text-muted text-center">Answers not available</p>

                @endif
            </div>
        </div>
    </div>
</div>
