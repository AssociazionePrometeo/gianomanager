@extends('layout')

@section('class', 'login')

@section('title', 'Login')

@section('main')
    <div id="content">
        <div class="row align-center align-middle">
            <div class="col col-4 login-box">
                <h3 class="text-center site-name">{{ config('app.name') }}</h3>

                @include('flash::message')

                @if($errors->any())
                    <div class="message error" data-component="message">{{ $errors->first() }}<span class="close small"></span></div>
                @endif

                <form action="{{ route('login') }}" method="post" class="form">
                    {{ csrf_field() }}

                    <div class="form-item">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" autofocus="autofocus" class="big text-center">
                    </div>

                    <div class="form-item">
                        <input type="password" name="password" placeholder="Password" class="big text-center">
                    </div>

                    <div class="form-item">
                        <button type="submit" class="button big w100">@lang('auth.login')</button>
                    </div>

                    <div class="small text-center">
                        <a href="{{ route('password.request') }}">@lang('auth.forgot_password')</a>
                    </div>

                    <div class="small text-center">
                        <a href="{{ route('register') }}">@lang('auth.register')</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
