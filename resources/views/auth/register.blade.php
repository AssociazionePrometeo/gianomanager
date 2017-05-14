@extends('layout')

@section('title', __('auth.register'))

@section('class', 'login')

@section('main')
    <div id="content">
        <div class="row align-center align-middle">
            <div class="col col-4 login-box">
                <h3 class="text-center site-name">@lang('auth.register')</h3>

                {!! Form::open(['route' => 'register', 'method' => 'post', 'class' => 'form']) !!}

                    @include('form.item', [
                                'name'  => 'name',
                                'label' => __('models.name'),
                                'field' => Form::text('name'),
                            ])

                    @include('form.item', [
                        'name'  => 'email',
                        'label' => __('models.email'),
                        'field' => Form::email('email'),
                    ])

                    @include('form.item', [
                        'name'  => 'phone_number',
                        'label' => __('models.phone_number'),
                        'field' => Form::text('phone_number')
                    ])


                {{csrf_token()}}
                    @include('form.item', [
                        'name'  => 'password',
                        'label' => __('models.password'),
                        'field' => Form::password('password'),
                    ])

                    @include('form.item', [
                        'name'  => 'password_confirmation',
                        'label' => __('models.password_confirm'),
                        'field' => Form::password('password_confirmation'),
                    ])

                <div class="form-item">
                    <button type="submit" class="button w100">@lang('auth.register')</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
