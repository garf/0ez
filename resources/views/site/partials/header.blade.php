@if(Conf::has('appearance.logo'))
    <div style="background: #FFF;">
        <div class="container hidden-xs hidden-sm hidden-md">
            <h1 style="margin:0;">
                <a href="{{ route('index') }}">
                    <img src="/upload/{{ Conf::get('appearance.logo') }}" alt="{{ Conf::get('app.sitename') }}" />
                </a>
            </h1>
        </div>
    </div>
@endif
@include('site.partials.top-nav')
<br />