@extends('admin.layout')

@section('title', __('models.subscription_edit'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('subscription', 2) => route('admin.subscriptions.index'),
        __('models.subscription_edit'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.subscription_edit') <em>{{ $subscription->name }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $subscription)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($subscription, [
        'route' => ['admin.subscriptions.update', $subscription],
        'method' => 'put',
        'class' => 'form',
        'id' => 'form-edit'
    ]) !!}

    @include('admin.subscriptions.form')
    <input type="submit" id="save" class="hide">

    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.subscriptions.destroy', $subscription], 'method' => 'delete', 'id' => 'form-delete']) !!}
        <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
