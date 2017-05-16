@extends('admin.layout')

@section('title', __('models.resource_new'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.resource', 2) => route('admin.resources.index'),
        __('models.resource_new'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.resource_new')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.resources.store', 'method' => 'post', 'id' => 'form-edit']) !!}

    @include('admin.resources.form')
    <input type="submit" id="save" class="hide">

    {!! Form::close() !!}
@endsection
