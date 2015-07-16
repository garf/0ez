@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l9">
                <div class="row" data-equalizer>
                    @foreach($posts as $post)
                        @include('site.blog._post', ['post' => $post])
                    @endforeach
                </div>
                <div class="center-align">
                    @if($posts->lastPage() > 1)
                        {!! $posts->render() !!}
                    @endif
                </div>
            </div>
            <div class="col s12 m12 l3">
                @include('site.partials.categories-menu')
            </div>
        </div>
    </div>
@stop

@section('js-bottom')

@stop