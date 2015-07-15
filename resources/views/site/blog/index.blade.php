@extends('site.main')

@section('body')
    <div class="container">
        <div class="row">
            <div class="small-12 medium-12 large-9 columns">
                <div class="row" data-equalizer>
                    @foreach($posts as $post)
                        @include('site.blog._post', ['post' => $post])
                    @endforeach
                </div>
                <div class="text-center pagination-centered">
                    @if($posts->lastPage() > 1)
                        {!! $posts->render() !!}
                    @endif
                </div>
            </div>
            <div class="small-12 medium-12 large-3 columns">
                @include('site.partials.categories-menu')
            </div>
        </div>
    </div>
@stop

@section('js-bottom')
    <script src="/plugins/zurb/js/foundation/foundation.equalizer.js"></script>
    <script>
        $(document).foundation({
            equalizer: {
                // Specify if Equalizer should make elements equal height once they become stacked.
                equalize_on_stack: false,
                // Allow equalizer to resize hidden elements
                act_on_hidden_el: false
            }
        });
    </script>
@stop