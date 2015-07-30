<footer class="footer page-footer">
    <div class="footer-content"
         style="background: {{ Conf::get('appearance.footer.top_bg', '#ecf0f1') }}; color: {{ Conf::get('appearance.footer.top_text', '#2b4646') }};">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <h3 class="white-text">{{ Conf::get('app.sitename') }} - {{ Conf::get('seo.default.seo_title') }}</h3>
                    <p class="grey-text text-lighten-4">{!! nl2br(e(Conf::get('app.description'))) !!}</p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    @include('site.partials.bottom-nav')
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright"
         style="background: {{ Conf::get('appearance.footer.bottom_bg', '#c7dae5') }}; color: {{ Conf::get('appearance.footer.bottom_text', '#111111') }};">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">© {{ date('Y') }} <a href="{{ route('index') }}">{{ Conf::get('app.sitename') }}</a></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"></div>
            </div>
        </div>
    </div>
</footer>
