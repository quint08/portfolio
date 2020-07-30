<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- pwa --}}
        <meta name="full-screen" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-title" content="Portfolio">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        {{-- title + csrf token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{ csrf_token() }}'}</script>
        <title>{{ config('app.name', 'Portfolio - Quinten Fisser') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://unpkg.com/fullpage.js/dist/fullpage.min.css">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <style>
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            display: inline-block;
            margin: 0 10px;
        }
        a {
            color: #42b983;
        }
    </style>
    <body>
    <div id="app"">
        
    </div>
        <script src="{{ asset('js/app.js') }}"></script>
        <script>
        function changeIndex() {
            var x = document.getElementsByClassName("date-provider");
            for (var i = 0; i < x.length; i++) {
                x[i].style.opacity = "1";
            };
        };
    
        function changeIndexBack() {
            var x = document.getElementsByClassName("date-provider");
            for (var i = 0; i < x.length; i++) {
                x[i].style.opacity = "0";
            };
        };
        function showCreate() {
            var y = document.getElementsByClassName("link-box");
            for (var i = 0; i < y.length; i++) {
                y[i].style.opacity = "1";
            };
        }
        function hideCreate() {
            var y = document.getElementsByClassName("link-box");
            for (var i = 0; i < y.length; i++) {
                y[i].style.opacity = "0";
            };
        }
        </script>
    </body>
</html>
