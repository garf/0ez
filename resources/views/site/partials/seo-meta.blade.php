<title>{{ \Title::render() }}</title>
<meta name="description" content="{{ (isset($seo_description)) ? $seo_description : Conf::get('seo.default.seo_description') }}">
<meta name="keywords" content="{{ (isset($seo_keywords)) ? $seo_keywords : Conf::get('seo.default.seo_keywords') }}">
<meta name="robots" content="{{ Conf::get('seo.index') }}"/>