@if ($model instanceof App\Models\Question)
    @php
        $name="question";
        $firstURLSegment="questions";
    @endphp
@elseif ($model instanceof App\Models\Answer)
    @php
        $name="answer";
        $firstURLSegment="answers";
    @endphp
@endif
@php
    $formId = $name . '-' .$model->id;
@endphp

    <div class="d-sm-block">
        <a title="This {{$name}} is useful"
            class="vote-up {{ Auth::guest() ? 'off' : '' }}"
            onclick="event.preventDefault();
                     document.getElementById('vote-up-{{ $formId }}').submit();">
            <i class="fas fa-caret-up fa-3x"></i>
        </a>
        <form id="vote-up-{{ $formId }}"
              action="{{ route($firstURLSegment.'.vote',$model->id) }}"
              method="post"
              style="display: none;">
            @csrf
            <input type="hidden" name="vote" value="1">
        </form>
        <span class="votes-count">{{$model->votes_count}}</span>

        <a title="This {{$name}} is not useful"
            class="vote-down {{ Auth::guest() ? 'off' : '' }}"
            onclick="event.preventDefault();
                     document.getElementById('vote-down-{{ $formId }}').submit();">

            <i class="fas fa-caret-down fa-3x"></i>
        </a>
        <form id="vote-down-{{ $formId }}"
            action="{{route($firstURLSegment.'.vote',$model->id)}}"
            method="post"
            style="display: none;">
          @csrf
          <input type="hidden" name="vote" value="-1">
        </form>

            @if($model instanceof App\Models\Question)
                @include('shared._favorite',[
                    'model' => $model
                ])
            @elseif ($model instanceof App\Models\Answer)
                @include('shared._accept',[
                    'model' => $model
                ])
            @endif
    </div>

