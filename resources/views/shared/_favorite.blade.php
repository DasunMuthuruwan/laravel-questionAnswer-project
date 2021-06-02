<a title="Click to mark as favorite question"
    onclick="event.preventDefault();
      document.getElementById('favorite-question-{{ $model->id }}').submit();"
    class="favorite {{ Auth::guest() ? 'off' : ($model->is_favorited ? 'favorited' : '') }}">
    <i class="fas fa-star fa-2x"></i>
</a>
<span class="favorite-count mt-2">{{ $model->favorites_count }}</span>
<form id="favorite-question-{{ $model->id }}"
    action="{{ route('questions.favorites',$model->id) }}"
    method="post"
    style="display: none;">
    @csrf
    @if ($model->is_favorited)
        @method('DELETE')
    @endif
</form>
