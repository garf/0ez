<ul class="nav nav-tabs" role="tablist">
    @if(Conf::get('social.comments.facebook.enabled', false))
        <li role="presentation" class="active">
            <a href="#facebook" aria-controls="facebook" onclick="FB.XFBML.parse();" role="tab" data-toggle="tab">
                @lang('socials.services.facebook.title')
            </a>
        </li>
    @endif
    @if(Conf::get('social.comments.vk.enabled', false))
        <li role="presentation">
            <a href="#vk" aria-controls="vk" role="tab" data-toggle="tab">
                @lang('socials.services.vk.title')
            </a>
        </li>
    @endif
</ul>
<div class="tab-content">
    @if(Conf::get('social.comments.facebook.enabled', false))
        <div role="tabpanel" class="tab-pane active" id="facebook">
            <div class="fb-comments"
                 data-href="{{ Request::url() }}"
                 data-width="{{ Conf::get('social.comments.facebook.width') }}"
                 data-numposts="{{ Conf::get('social.comments.facebook.limit') }}"
                 data-colorscheme="{{ Conf::get('social.comments.facebook.color_scheme') }}"></div>
        </div>
    @endif
    @if(Conf::get('social.comments.vk.enabled', false))
        <div role="tabpanel" class="tab-pane" id="vk">
            <div id="vk_comments"></div>
        </div>
        <script type="text/javascript">
            VK.Widgets.Comments("vk_comments", {limit: {{ Conf::get('social.comments.vk.limit') }}, width: "{{ Conf::get('social.comments.vk.width') }}", attach: "*"});
        </script>
    @endif
</div>

