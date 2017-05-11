@extends('layout')

@section('title', __('models.reservation_new'))

@section('heading')
    <h1>{{ trans_choice('models.reservation', 2) }}</h1>
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.reservation_new')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'reservations.store', 'method' => 'post', 'id' => 'form-edit']) !!}
        @include('user.reservations.form')
    {!! Form::close() !!}
@endsection
