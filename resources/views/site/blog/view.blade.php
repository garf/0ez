@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l9">
                <article>
                    <div class="card">
                        <div class="card-content">
                            <h1 class="card-title blue-grey-text darken-4">{{ $post->title }}</h1>

                            <div class="row">
                                <div class="col s12 m12 l4">
                                    <div class="card-image">
                                        <img src="{{ $post->img }}" alt="" class="circle responsive-img">
                                    </div>
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
                                    </div>
                                </div>
                                <div class="col s12 m12 l8 flow-text">
                                    {!! $post->content !!}
                                </div>
                            </div>

                        </div>
                        <div class="card-action">
                            <h3>Похожие посты</h3>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col s12 m12 l3">
                @include('site.partials.categories-menu')
            </div>
        </div>
    </div>
@stop