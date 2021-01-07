<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>App Name - @yield('titulo')</title>
    <style>@yield('style')</style>
</head>
<body>
    <div class="container">
        @yield('contenido')
    </div>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
