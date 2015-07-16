<title>{{ (isset($seo_title)) ? $seo_title . ' - ' . config('app.sitename') : config('app.sitename') . ' - ' . config('seo.default.seo_title') }}</title>
<meta name="description" content="{{ (isset($seo_description)) ? $seo_description : config('seo.default.seo_description') }}">
<meta name="keywords" content="{{ (isset($seo_keywords)) ? $seo_keywords : config('seo.default.seo_keywords') }}">
