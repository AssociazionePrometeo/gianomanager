@extends('admin.layout')

@section('title', __('models.subscription_new'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.subscription', 2) => route('admin.subscriptions.index'),
        __('models.subscription_new'),
    ]])
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
    {!! Form::open(['route' => 'admin.subscriptions.store', 'method' => 'post', 'id' => 'form-edit']) !!}

    @include('admin.subscriptions.form')
    <input type="submit" id="save" class="hide">

    {!! Form::close() !!}
@endsection
