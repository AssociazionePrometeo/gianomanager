<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title', 'Giano') @yield('title.suffix')</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>

    <body class="@yield('class')">            

        @yield('navigation')

        <main id="main" class="container">
            @include('flash::message')
            @yield('main')
            
        </main>
        
        @section('javascripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="/assets/js/kube.js"></script>
        @show
    </body>
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('assets/lib/css/selectize.default.css') }}">
    @show
</html>
