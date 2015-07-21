@inject('related', 'App\Services\Blog')
<div class="row related-list">
    @foreach ($related->getRelatedPosts($post->tags, $post->id) as $post)
        <div class="col-sm-12 col-md-6 col-lg-3 related-item">
            <div class="related-img">
                <a href="{{ route('view', ['slug' => $post->slug]) }}">
                    <img src="/upload/{{ $post->img }}" alt="" >
                </a>
            </div>
            <div class="related-link">
                <a href="{{ route('view', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
            </div>
        </div>
    @endforeach
</div>
