@can('accept', $model)
    <a title="Click to mark as favorite answer"
        class="{{ $model->status }}"
        onclick="event.preventDefault(); document.getElementById('answer-accept-{{ $model->id }}').submit();">
            <i class="fas fa-check fa-2x"></i>
    </a>
    <form
        id="answer-accept-{{ $model->id }}"
        action="{{ route('answers.accept',$model->id) }}"
        style="display: none;"
        method="post">
        @csrf
    </form>
@else
    @if ($model->is_best)
        <a
            title="The question owner accepted this answer as best answer"
            class="{{ $model->status }}">
            <i class="fas fa-check fa-2x"></i>
        </a>
    @endif
@endcan
