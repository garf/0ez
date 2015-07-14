@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    @foreach($posts as $post)
                        @include('site.blog._post', ['post' => $post])
                    @endforeach
                </div>
                @if($posts->lastPage() > 1)
                    <div class="center-align">{!! $posts->render() !!}</div>
                @endif
            </div>
            <div class="col-md-3">
                <h3>Категории</h3>
            </div>
        </div>
    </div>
@stop