@extends('layout')

@section('class', 'login')

@section('main')
    <div id="content">
        <div class="row align-center align-middle">
            <div class="col col-4 login-box">
                <h3 class="text-center site-name">{{ config('app.name') }}</h3>

                @if($errors->any())
                    <div class="message error" data-component="message">The email was not found.<span class="close small"></span></div>
                @endif

                @if(session('status'))
                    <div class="message success" data-component="message">{{ session('status') }}<span class="close small"></span></div>
                @endif
                <form class="form" role="form" method="post" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-item">
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" class="big text-center">
                    </div>

                    <div class="form-item">
                        <button type="submit" class="button big w100">Send password reset link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
