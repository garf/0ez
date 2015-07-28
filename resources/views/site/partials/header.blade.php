@if(Conf::has('appearance.logo'))
    <div style="background: #FFF;">
        <div class="container hidden-xs hidden-sm hidden-md">
            <img src="/upload/{{ Conf::get('appearance.logo') }}" alt="" />
        </div>
    </div>
@endif
@include('site.partials.top-nav')
<br />