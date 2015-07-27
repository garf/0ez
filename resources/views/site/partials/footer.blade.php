<footer class="footer page-footer">
    <div class="footer-content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <h3 class="white-text">{{ Conf::get('app.sitename') }} - {{ Conf::get('seo.default.seo_title') }}</h3>
                    <p class="grey-text text-lighten-4">{!! nl2br(e(Conf::get('app.description'))) !!}</p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    {{--<h5 class="white-text">Инфо</h5>--}}
                    {{--<ul>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Интересное</a></li>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Написать мне</a></li>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">Карта</a></li>--}}
                        {{--<li><a class="grey-text text-lighten-3" href="#!">О блоге</a></li>--}}
                    {{--</ul>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">© {{ date('Y') }} <a href="{{ route('index') }}">{{ Conf::get('app.sitename') }}</a></div>
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right"></div>
            </div>
        </div>
    </div>
</footer>
