<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title', 'Giano') @yield('title.suffix')</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>

    <body class="@yield('class')">

        @yield('navigation')

        <main id="main" class="container">
<<<<<<< HEAD
<<<<<<< HEAD
            @include('flash::message')
=======

>>>>>>> add row user profile page and corrected a /home route
=======

>>>>>>> c084f949d9b9d2b0bbfdbedaf1e9e9ef3ba07d38
            @yield('main')

        </main>

        @section('javascripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="{{ asset('assets/js/kube.js') }}"></script>
            <script src="{{ asset('assets/js/datepicker.js') }}"></script>
            <script>$('.datepicker').pickadate({format: 'yyyy-mm-dd'})</script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
            <script>$('select.autocomplete').selectize();</script>
        @show
    </body>
    @section('stylesheets')
        <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css">
    @show
</html>
