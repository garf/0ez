@foreach($tags as $tag)
    <a href="{{ route('tag', ['tag' => $tag->tag]) }}" class="label label-default tag-item">{{ $tag->tag }}</a>&nbsp;
@endforeach