@if(count($services) > 0)
    <div class="panel panel-default" id="socialLinksWidget">
        <div class="panel-body text-center">
            <div class="row">
                @foreach($services as $service)
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center" style="margin: 10px 0;">
                        <div>
                            <a href="{{ $service['url'] }}" target="_blank">
                                <i class="fa {{ trans("socials.services.{$service['service']}.icon") }} fa-2x"
                                   style="color: {{ trans("socials.services.{$service['service']}.color") }};"></i>
                            </a>
                        </div>
                        @if($service['show_title'])
                            <div>
                                <a href="{{ $service['url'] }}" target="_blank">
                                    {{ trans("socials.services.{$service['service']}.title") }}
                                </a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif