@extends('admin.layout')

@section('title', __('models.reservation_edit'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('reservation', 2) => route('admin.reservations.index'),
        __('models.reservation_edit'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('actions.reservation_edit') <em>#{{ $reservation->id }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $reservation)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($reservation, [
        'route' => ['admin.reservations.update', $reservation],
        'method' => 'put',
        'class' => 'form',
        'id' => 'form-edit'
    ]) !!}

    @include('admin.reservations.form')
    <input type="submit" id="save" class="hide">

    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.reservations.destroy', $reservation], 'method' => 'delete', 'id' => 'form-delete']) !!}
        <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection