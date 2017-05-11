@extends('layout')

@section('class', 'login')

@section('title', 'Reset password')

@section('main')
    <div id="content">
        <div class="row align-center align-middle">
            <div class="col col-4 login-box">
                <h3 class="text-center site-name">{{ config('app.name') }}</h3>
                @if (session('status'))
                    <div class="message success" role="message">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form" role="form" method="post" action="{{ route('password.request') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    @include('form.item', [
                        'name' => 'email',
                        'label' => 'Email',
                        'field' => Form::email('email', null, ['class' => 'big']),
                    ])

                    @include('form.item', [
                        'name' => 'password',
                        'label' => 'Password',
                        'field' => Form::password('password', ['class' => 'big']),
                    ])

                    @include('form.item', [
                        'name' => 'password_confirmation',
                        'label' => 'Confirm password',
                        'field' => Form::password('password_confirmation', ['class' => 'big']),
                    ])

                    <div class="form-item">
                        <button type="submit" class="button big w100">Reset password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
