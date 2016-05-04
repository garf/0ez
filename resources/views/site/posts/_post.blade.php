<div class="{{ $post->is_pinned == '1' ? 'post-pinned' : 'post-regular' }} post">
    <a href="{{ route('view', ['slug' => $post->slug]) }}">
        <img class="post-image" src="{{ starts_with($post->img, ['http://', 'https://']) ? '' : '/upload/' }}{{ $post->img }}" alt="">
    </a>
    <div class="row">
        <div class="col-lg-12">
            <div class="post-content">
                <h2 class="post-title">
                    <a href="{{ route('view', ['slug' => $post->slug]) }}">{!! highlight_str($post->title, $q) !!}</a>
                </h2>
                <p class="lead">{!! nl2br(highlight_str(strip_tags($post->excerpt), $q)) !!}</p>
                <hr />
                <div class="row">
                    <div class="col-lg-12">
                        <div>
                            <i class="fa fa-square"></i>
                            <a href="{{ route('category', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                        </div>
                        <div>
                            <i class="fa fa-clock-o"></i>
                            <span class="text-muted">Опубликовано:</span>
                            {{ hdate($post->published_at) }}
                            <small class="text-muted">({{ date('d.m.Y', strtotime($post->published_at)) }})</small>
                        </div>
                        <div>
                            @include('site.partials.tags-list', ['tags' => $post->tags])
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
