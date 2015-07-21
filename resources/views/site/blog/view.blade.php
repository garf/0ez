@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-9">
                <article>
                    <div class="card">
                        <div class="card-content">
                            <h1 class="card-title blue-grey-text darken-4">{{ $post->title }}</h1>

                            <div class="row">
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="card-image">
                                        <img src="{{ $post->img }}" alt="" style="max-width: 100%;" class="circle responsive-img">
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12">
                                    <br />
                                    {!! $post->content !!}
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
                        <div class="card-action">
                            <h3>Похожие посты</h3>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-3">
                @include('site.partials.categories-menu')
            </div>
        </div>
    </div>
@stop