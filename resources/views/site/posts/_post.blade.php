<div class="row {{ $post->is_pinned == '1' ? 'post-pinned' : 'post-regular' }} post">
    <div class="col-lg-4 post-image">
        <a href="{{ route('view', ['slug' => $post->slug]) }}">
            <img class="media-object" style="max-width: 100%;" src="/upload/{{ $post->img }}" alt="">
        </a>
    </div>
    <div class="col-lg-8">
        <div class="post-content">
            <h2 class="post-title">
                <a href="{{ route('view', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
            </h2>
            <p>{!! $post->excerpt !!}</p>
            <hr />
            <div class="row">
                <div class="col-lg-12">
                    <div>
                        <span class="text-muted">Категория:</span>
                        <a href="{{ route('category', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                    </div>
                    <div>
                        <span class="text-muted">Опубликовано:</span> {{ hdate($post->published_at) }}
                    </div>
                    <div>
                        <span class="text-muted">Теги:</span> @include('site.partials.tags-list', ['tags' => $post->tags])
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<hr />
