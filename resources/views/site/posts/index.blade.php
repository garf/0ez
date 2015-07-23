@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="row" data-equalizer>
                    @foreach($posts as $post)
                        @include('site.posts._post', ['post' => $post])
                    @endforeach
                </div>
                <div class="text-center">
                    @if($posts->lastPage() > 1)
                        {!! $posts->render() !!}
                    @endif
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                <div style="padding-left: 15px;">
                    <h4>Категории</h4>
                    @include('site.partials.categories-menu')
                </div>
            </div>
        </div>
    </div>
@stop

@section('js-bottom')

@stop