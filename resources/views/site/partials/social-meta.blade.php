@if(Conf::has('social.vk.app_id'))
    <script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

    <script type="text/javascript">
        VK.init({apiId: {{ Conf::get('social.vk.app_id') }}, onlyWidgets: true});
    </script>
@endif