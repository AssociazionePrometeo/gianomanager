<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title', 'S19') @yield('title.suffix')</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>

    <body class="@yield('class')">            

        @yield('navigation')

        <main id="main" class="container">
    
            @yield('main')
            
        </main>
        
        @section('javascripts')
            <script src="{{ asset('assets/js/main.min.js') }}"></script>
            <script>require(['jquery', 'selectize'], function($) { $('select').selectize(); })</script>
        @show
    </body>
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('assets/lib/css/selectize.default.css') }}">
    @show
</html>
