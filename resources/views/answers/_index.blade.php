<div class="row">
    <div class="col-md-12">
        <div class="card shadow mb-4 mt-4">
            <div class="card-header">
                <h2>{{ $answerCount . " " . Str::plural('Answer', $question->answers_count) }}</h2>
            </div>
            <div class="card-body">
                @if(count($answers)>0)
                    @foreach ($answers as $answer)
                    <div class="d-flex flex-row vote-controls">
                        <span class="d-sm-block">
                            <a title="This answer is useful" class="vote-up"><i class="fas fa-caret-up fa-3x"></i></a>
                            <span class="votes-count">123</span>
                            <a title="This answer is not useful" class="vote-down off"><i class="fas fa-caret-down fa-3x"></i></a>
                            <a title="Click to mark as favorite answer" class="vote-accepted"><i class="fas fa-check fa-2x"></i></a>
                        </span>
                        <p class="text-muted ml-4">{{ $answer->body }}</p>
                    </div>
                        <div class="text-center">
                            <span class="text-muted">Answered {{ $answer->created_date }}</span>
                            <div class="media mt-2">
                                <a href="{{ $answer->user->url }}" class="pr-2">
                                    <img src="{{ $answer->user->avatar }}" alt="">
                                </a>
                                <div class="media-body">
                                    <a href="{{ $answer->user->url }}"> <small>{{$answer->user->name}}</small></a>
                                </div>
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
