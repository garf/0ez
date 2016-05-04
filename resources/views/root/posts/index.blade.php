@extends('root.main')

@section('body')
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2">
                <div class="sidebar-nav">
                    <a href="{{ route('root-posts-new') }}" class="btn btn-block btn-success">New Post</a>
                    <br />
                    <div>
                        <form method="GET" action="{{ route('root-posts') }}">
                            @foreach($url_params as $url_key=>$url_param)
                                <input type="hidden" name="{{ $url_key }}" value="{{ $url_param }}" />
                            @endforeach
                            <input type="text" name="q" value="{{ $q }}" placeholder="Fast search..." class="form-control" />
                        </form>
                    </div>
                    <br />
                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ $status == 'all' ? 'active' : '' }}">
                            <a href="{{ route('root-posts') }}">All Posts</a>
                        </li>
                        <li class="{{ $status == 'draft' ? 'active' : '' }}">
                            <a href="{{ route('root-posts', ['status' => 'draft']) }}">Drafts</a>
                        </li>
                        <li class="{{ $status == 'moderation' ? 'active' : '' }}">
                            <a href="{{ route('root-posts', ['status' => 'moderation']) }}">Moderation</a>
                        </li>
                        <li class="{{ $status == 'refused' ? 'active' : '' }}">
                            <a href="{{ route('root-posts', ['status' => 'refused']) }}">Refused</a>
                        </li>
                        <li class="{{ $status == 'deleted' ? 'active' : '' }}">
                            <a href="{{ route('root-posts', ['status' => 'deleted']) }}">Deleted</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-10">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Post</th>
                                <th>Published</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                @include('root.posts._post')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div>
                    @if($posts->lastPage() > 1)
                        {!! $posts->render() !!}
                    @endif
                </div>
            </div>
        </div>


    </div>
@stop
