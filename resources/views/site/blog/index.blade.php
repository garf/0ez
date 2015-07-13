@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col s9">
                <div class="row">
                    @foreach($posts as $post)
                        @include('site.blog._post', ['post' => $post])
                    @endforeach
                </div>
            </div>
            <div class="col s4">

            </div>
        </div>
    </div>
@stop