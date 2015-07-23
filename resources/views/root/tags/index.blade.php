@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <br/>
        <div class="well well-sm text-right">
            <a href="{{ route('root-tags-clear-orphaned') }}" onclick="return confirm('Are you sure?');" class="btn btn-info">Clean Orphaned Tags</a>
        </div>
        <div class="">
            <ul class="list-group">
                @foreach($tags as $tag)
                    <li class="list-group-item">
                        <span class="badge" title="Posts count">{{ $tag->num }}</span>
                        <a class="brown-text" href="{{ route('tag', ['tag' => $tag->tag]) }}" target="_blank">
                            {{ $tag->tag }}
                        </a>&nbsp;
                        <a href="{{ route('root-tags-remove', ['tag_id' => $tag->id]) }}" onclick="return confirm('You want to remove this tag?');"><i class="fa fa-times"></i></a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop