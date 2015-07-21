<div class="row {{ $post->is_pinned == '1' ? 'post-pinned' : 'post-regular' }} post">
    <div class="col-lg-4 post-image">
        <a href="{{ route('view', ['slug' => $post->slug]) }}">
            <img class="media-object" style="max-width: 100%;" src="/upload/{{ $post->img }}" alt="">
        </a>
    </div>
    <div class="col-lg-8">
        <div class="post-content">
            <h4 class="media-heading"><a href="{{ route('view', ['slug' => $post->slug]) }}"
                                         class="card-title activator grey-text text-darken-4">{{ $post->title }}</a>
            </h4>

            <p>{!! $post->excerpt !!}</p>

            <div class="row">
                <div class="col-lg-6">
                    <div>
                        <span class="text-muted">Категория:</span>
                        <a href="{{ route('category', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                    </div>
                    <div>
                        <span class="text-muted">Опубликовано:</span> {{ hdate($post->published_at) }}
                    </div>
                    <div>
                        Теги: @include('site.partials.tags-list', ['tags' => $post->tags])
                    </div>
                </div>
                <div class="col-lg-6 text-right">

                </div>
            </div>
        </div>

    </div>
</div>
<hr />
