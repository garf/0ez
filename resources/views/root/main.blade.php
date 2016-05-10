<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('site.partials.seo-meta')
    @yield('meta')
    <link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap.min.css">
    {{--<link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap-sandstorm.min.css">--}}
    {{--<link rel="stylesheet" href="/plugins/bootstrap/css/bootstrap-theme.min.css">--}}
    {{--<link rel="stylesheet" href="/plugins/flat-ui/css/flat-ui.min.css">--}}
    <link rel="stylesheet" href="/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ elixir('t/root/css/root.css') }}">
    @yield('css')
    @yield('js-top')
</head>
<body>
@include('root.partials.header')
<div class="container">
    {!! Notifications::byGroup('0')->toHTML() !!}
</div>
@yield('body')
@include('root.partials.footer')
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/plugins/bootstrap/js/bootstrap.min.js"></script>
{{--<script src="/plugins/flat-ui/js/flat-ui.min.js"></script>--}}
<script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.12.8/vue.min.js"></script>
<script src="{{ elixir('t/root/js/root.js') }}"></script>
@yield('js-bottom')
</body>
</html>