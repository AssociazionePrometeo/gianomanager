<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title', 'Giano') @yield('title.suffix')</title>
        <link rel="stylesheet" href="/assets/css/style.css">
    </head>

    <body class="@yield('class')">

        @yield('navigation')
        
        <main id="main">

            @section('main')

                <div id="sidebar">
                    @section('sidebar')
                        @include('sidebar')
                    @show
                </div>

                <div id="content">

                    <div class="content-heading container">
                        <div class="row gutters">
                            <div class="col col-8">
                                @yield('heading')
                            </div>
                            <div class="col col-4">
                                @if(Auth::check())
                                    @include('user_navigation')
                                @endif
                            </div>
                        </div>
                    </div>

                    @yield('topbar')

                    <div class="container">
                        @include('flash::message')
                    </div>

                    <div class="container">
                        @yield('content')
                    </div>
                </div>

            @show

        </main>

        @section('javascripts')
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
            <script src="{{ asset('assets/js/kube.js') }}"></script>
            <script src="{{ asset('assets/js/datepicker.js') }}"></script>
            <script>$('.datepicker').pickadate({format: 'yyyy-mm-dd'})</script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/js/standalone/selectize.min.js"></script>
            <script>$('select.autocomplete').selectize();</script>
        @show
        @section('stylesheets')
            <link rel="stylesheet" href="{{ asset('assets/css/datepicker.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.4/css/selectize.default.min.css">
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        @show
    </body>
</html>
