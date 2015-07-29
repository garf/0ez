@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div class="post-body">
                    <img src="/upload/{{ $post->img }}" alt="" style="max-width: 100%;" class="circle responsive-img">
                    <article>
                        <div class=" post-content">
                            <div class="">
                                <h1 class="">{{ $post->title }}</h1>
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <div class="">
                                            {!! $post->content !!}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div>
                                    <div>
                                        Категория:
                                        <a href="{{ route('category', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                                    </div>
                                    <div>
                                        Автор: {{ $post->user->name }}
                                    </div>
                                    <div>
                                        Опубликовано: {{ hdate($post->published_at) }}
                                    </div>
                                    <div>
                                        Теги: @include('site.partials.tags-list', ['tags' => $post->tags])
                                    </div>
                                </div>

                            </div>
                            <div class="">
                                @include('site.partials.related', ['post' => $post])
                            </div>
                        </div>
                    </article>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                @include('site.partials.categories-menu')
            </div>
        </div>
    </div>
@stop

@section('meta')
    <link rel="author" href="{{ $post->user->name or '' }}" />
@stop