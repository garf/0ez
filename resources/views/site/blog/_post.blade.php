<div class="col s6">
    <div class="card blog-post">
        <div class="card-image">
            <img src="{{ $post->img }}">
            <span class="card-title white black-text blog-post-title">{{ $post->title }}</span>
        </div>
        <div class="card-content">
            {!! $post->excerpt !!}
        </div>
        <div class="card-action light-green darken-2 right-align">
            <a href="#" class="btn-flat white-text">Читать далее</a>
        </div>
    </div>
</div>
