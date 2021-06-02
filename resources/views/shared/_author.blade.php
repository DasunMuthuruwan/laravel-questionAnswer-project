<span class="text-muted">{{$label .' '. $model->created_date }}</span>
<div class="media mt-2">
    <a href="{{ $model->user->url }}" class="ml-2">
        <img src="{{ $model->user->avatar }}" alt="" class="mx-auto">
    </a>
    <a href="{{ $model->user->url }}">
        <small class="text-center">{{$model->user->name}}</small>
    </a>
</div>
