@extends('layout')

@section('title', __('user.profile'))

@section('heading')
    <h1>@lang('user.profile')</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('user.edit_profile')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')


    <div class="row">
        <div class="col col-12">

            {!! Form::model($user, ['route' => 'profile.update', 'method' => 'put', 'id' => 'form-edit', 'class' => 'form']) !!}

                @include('form.item', [
                    'name' => 'name',
                    'label' => __('models.name'),
                    'field' => Form::text('name', null, ['disabled'])
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

                @include('form.item', [
                    'name'  => 'expires_at',
                    'label' => __('models.user_expires_at'),
                    'field' => Form::date('expires_at', null, ['disabled']),
                ])

                @include('form.item', [
                    'name'  => 'password',
                    'label' => __('models.password'),
                    'field' => Form::password('password'),
                    'desc' => 'Lascia vuoto per mantenere quella attuale',
                ])

                @include('form.item', [
                    'name'  => 'password_confirmation',
                    'label' => __('models.password_confirm'),
                    'field' => Form::password('password_confirmation'),
                ])

                <div class="form-item">
                    <label>@lang('models.status')
                        <span class="label {{ $user->active ? 'success' : 'warning' }}">
                                {{ $user->active ? __('models.user_active') : __('models.user_inactive') }}
                            </span>
                    </label>
                </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection
