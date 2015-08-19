<div class="row">
    @foreach($services as $service)
        @if(Conf::get('social.links.' . $service['name'], '') != '')
            <div class="col-md-3 col-sm-6 col-xs-12 text-center" style="margin-bottom: 30px;">
                <div>
                    <a href="{{ Conf::get('social.links.' . $service['name']) }}" target="_blank">
                        <i class="fa {{ $service['icon'] }} fa-2x" style="color: {{ $service['color'] }};"></i>
                    </a>
                </div>
                @if(Conf::get('social.show_titles', false))
                    <div>
                        <a href="{{ Conf::get('social.links.' . $service['name']) }}" target="_blank">
                            {{ $service['title'] }}
                        </a>
                    </div>
                @endif
            </div>
        @endif
    @endforeach
</div>