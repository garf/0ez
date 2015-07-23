@foreach($tags as $tag)
    <a href="{{ route('tag', ['tag' => $tag->tag]) }}" class="tag-item">{{ $tag->tag }}</a>&nbsp;
@endforeach