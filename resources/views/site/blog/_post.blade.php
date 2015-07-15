    <div class="small-12 medium-12 large-6 columns panel panel-success blog-post" data-equalizer-watch>
        <div class="panel-heading card-image" style="min-height: 70px;">
            <h2>
                <small class="card-title white black-text blog-post-title">
                    {{ $post->title }}
                </small>
            </h2>
        </div>
        <div class="panel-body">
            <img src="{{ $post->img }}" alt="" style="max-width: 100%;">
            <div style="margin-top: 10px;">
                {!! $post->excerpt !!}
            </div>
        </div>
        <div class="panel-footer text-right">
            <a href="#" class="btn btn-warning">Читать далее</a>
        </div>
    </div>
