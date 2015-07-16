<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    @include('site.partials.seo-meta')
    @yield('meta')
    <link rel="stylesheet" href="/plugins/materialize/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ elixir('t/site/css/site.css') }}">
    @yield('css')
    @yield('js-top')
</head>
<body>
    @include('site.partials.header')
    @yield('body')
    @include('site.partials.footer')
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="/plugins/materialize/js/materialize.min.js"></script>
    <script src="{{ elixir('t/site/js/site.js') }}"></script>
    @yield('js-bottom')
</body>
</html>