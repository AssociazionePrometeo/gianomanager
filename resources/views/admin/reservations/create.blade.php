@extends('admin.layout')

@section('title', __('models.reservation_new'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.reservation', 2) => route('admin.reservations.index'),
        __('models.reservation_new'),
    ]])
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
    {!! Form::open(['route' => 'admin.reservations.store', 'method' => 'post', 'id' => 'form-edit']) !!}
        @include('admin.reservations.form')
        <input type="submit" id="save" class="hide">
    {!! Form::close() !!}
@endsection