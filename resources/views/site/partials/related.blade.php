@inject('related', 'App\Services\Blog')
<?php
    $posts = $related->getRelatedPosts($post->tags, $post->id);
?>
@if($posts->count() > 0)
    <hr />
    <h3>@lang('posts.related_posts')</h3>
    <div class="row related-list">
        @foreach ($posts as $post)
            <div class="col-sm-12 col-md-6 col-lg-3 related-item">
                <div class="related-img">
                    <a href="{{ route('view', ['slug' => $post->slug]) }}">
                        <img src="{{ starts_with($post->img, ['http://', 'https://']) ? '' : '/upload/' }}{{ $post->img }}" alt="" >
                    </a>
                </div>
                <div class="related-link">
                    <a href="{{ route('view', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                </div>
            </div>
        @endforeach
    </div>
@endif
