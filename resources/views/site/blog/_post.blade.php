<div class="row">
    <div class="col-lg-4">
        <a href="{{ route('view', ['slug' => $post->slug]) }}">
            <img class="media-object" style="max-width: 100%;" src="{{ $post->img }}" alt="">
        </a>
    </div>
    <div class="col-lg-8">
        <h4 class="media-heading"><a href="{{ route('view', ['slug' => $post->slug]) }}"
                                     class="card-title activator grey-text text-darken-4">{{ $post->title }}</a></h4>

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
            </div>
            <div class="col-lg-6 text-right">
                <a href="{{ route('view', ['slug' => $post->slug]) }}">Читать далее</a>
            </div>
        </div>
    </div>
</div>
<hr />
