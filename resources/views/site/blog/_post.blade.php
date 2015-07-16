    <div class="col s12 m12 l12 blog-post">
        <div class="card ">
            <div class="card-image">
                <img src="{{ $post->img }}" alt="">
            </div>
            <div class="card-content">
                <a href="{{ route('view', ['slug' => $post->slug]) }}"
                   class="card-title activator grey-text text-darken-4">{{ $post->title }}</a>
                <p>{!! $post->excerpt !!}</p>
            </div>
            <div class="card-action">
                <div class="row">
                    <div class="col s12 m12 l7 left-align">
                        <div>
                            Категория: <a href="{{ route('category', ['slug' => $post->category->slug]) }}">{{ $post->category->title }}</a>
                        </div>
                        <div>
                            Автор: {{ $post->user->name }}
                        </div>
                    </div>
                    <div class="col s12 m12 l5 right-align">
                        <a href="{{ route('view', ['slug' => $post->slug]) }}" class="">Читать далее</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
