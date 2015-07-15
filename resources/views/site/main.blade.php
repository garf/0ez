<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    @yield('meta')
    <title>{{ $title or config('app.sitename') }}</title>
    {{-- MATERIALIZED --}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">--}}
    {{-- BOOTSTRAP MATERIAL --}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/material-fullpalette.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/ripples.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/css/roboto.min.css">--}}
    {{-- ZURB --}}
    <link rel="stylesheet" href="/plugins/zurb/css/foundation.min.css">
    @yield('css')
    @yield('js-top')
</head>
<body>
    @include('site.partials.header')
    @yield('body')
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    {{-- MATERIALIZED --}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>--}}
    {{-- BOOTSTRAP MATERIAL --}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/material.min.js"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-material-design/0.3.0/js/ripples.min.js"></script>--}}
    {{-- ZURB --}}
    <script src="/plugins/zurb/js/foundation.min.js"></script>
    @yield('js-bottom')
</body>
</html>