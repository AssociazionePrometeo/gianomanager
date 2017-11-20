@extends('layout')

@section('title', __('models.subscription_new'))

@section('heading')
    <h1>{{ trans_choice('models.subscription', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.subscription_new')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'subscriptions.store', 'method' => 'post', 'id' => 'form-edit']) !!}
        @include('user.subscriptions.form')
    {!! Form::close() !!}
@endsection
