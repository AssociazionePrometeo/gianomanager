@extends('layout')

@section('class', 'login')

@section('title', 'Login')

@section('main')
    <div id="content">
        <div class="row align-center align-middle">
            <div class="col col-4 login-box">
                <h3 class="text-center site-name">{{ config('app.name') }}</h3>

                @if($errors->any())
                    <div class="message error" data-component="message">Invalid email or password.<span class="close small"></span></div>
                @endif

                <form action="{{ route('login') }}" method="post" class="form">
                    {{ csrf_field() }}

                    <div class="form-item">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="big text-center">
                    </div>

                    <div class="form-item">
                        <input type="password" name="password" placeholder="Password" class="big text-center">
                    </div>

                    <div class="form-item">
                        <button type="submit" class="button big w100">Login</button>
                    </div>

                    <div class="small text-center">
                        <a href="{{ route('password.request') }}">Forgot Your Password?</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

