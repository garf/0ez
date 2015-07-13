<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    @yield('meta')
    <title>{{ $title or config('app.sitename') }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    @yield('css')
    @yield('js-top')
</head>
<body>

    @yield('body')
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
    @yield('js-bottom')
</body>
</html>