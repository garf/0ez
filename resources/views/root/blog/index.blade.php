@extends('root.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-2">
                <div class="sidebar-nav">
                    <a href="{{ route('root-posts-new') }}" class="btn btn-block btn-success">New Post</a>

                    <ul class="nav nav-pills nav-stacked">
                        <li class="{{ Input::get('status', 'all') == 'all' ? 'active' : '' }}"><a href="{{ route('root-posts') }}"
                               >All Posts</a></li>
                        <li class="{{ Input::get('status') == 'draft' ? 'active' : '' }}"><a href="{{ route('root-posts', ['status' => 'draft']) }}">Drafts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Published</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>
                                <div>
                                    <a href="#{{ $post->id }}">{{ $post->title }}</a>
                                    @if($post->status == 'draft')
                                        <span class="purple-text">Draft</span>
                                    @endif
                                </div>
                                <div class="post-options">
                                    <a href="{{ route('view', ['slug' => $post->slug]) }}" target="_blank" class="brown-text">View</a>
                                    <a href="#!" class="brown-text">Edit</a>
                                    @if($post->status == 'active')
                                        <a href="#!" class="brown-text">To Draft</a>
                                    @else
                                        <a href="#!" class="brown-text">Publish</a>
                                    @endif
                                    <a href="#!" class="brown-text">Delete</a>
                                    <a href="#!" class="brown-text">Pin</a>
                                </div>
                            </td>
                            <td>
                                <div>
                                    {{ date('Y.m.d H:i', strtotime($post->published_at)) }}
                                </div>
                                <div>
                                    <small class="text-muted">{{ hdate($post->published_at) }}</small>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
                    @if($posts->lastPage() > 1)
                        {!! $posts->render() !!}
                    @endif
                </div>
            </div>
        </div>


    </div>
@stop

@section('js-bottom')
    <script>
        $(document).ready(function () {
            $('.sidebar-nav .row').pushpin({top: $('.sidebar-nav').offset().top});
        });
    </script>
@stop