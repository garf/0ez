<div class="col-md-6 col-sm-12 col-xs-12">
    <div class="panel panel-success blog-post">
        <div class="panel-heading card-image" style="min-height: 70px;">
            <span class="card-title white black-text blog-post-title">{{ $post->title }}</span>
        </div>
        <div class="panel-body">
            <img src="{{ $post->img }}" alt="" style="max-width: 100%;">
            <div style="min-height: 100px; margin-top: 10px;">
                {!! $post->excerpt !!}
            </div>
        </div>
        <div class="panel-footer text-right">
            <a href="#" class="btn btn-warning">Читать далее</a>
        </div>
    </div>
</div>
