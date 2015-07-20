<title>{{ (app('title') == config('app.sitename')) ? app('title') . ' - ' . config('seo.default.seo_title') : app('title') }}</title>
<meta name="description" content="{{ (isset($seo_description)) ? $seo_description : config('seo.default.seo_description') }}">
<meta name="keywords" content="{{ (isset($seo_keywords)) ? $seo_keywords : config('seo.default.seo_keywords') }}">
