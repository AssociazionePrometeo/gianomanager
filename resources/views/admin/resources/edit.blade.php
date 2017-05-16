@extends('admin.layout')

@section('title', __('models.resource_edit'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('resource', 2) => route('admin.resources.index'),
        __('models.resource_edit'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.resource_edit') <em>{{ $resource->name }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $resource)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($resource, [
        'route' => ['admin.resources.update', $resource],
        'method' => 'put',
        'class' => 'form',
        'id' => 'form-edit'
    ]) !!}

    @include('admin.resources.form')
    <input type="submit" id="save" class="hide">

    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.resources.destroy', $resource], 'method' => 'delete', 'id' => 'form-delete']) !!}
        <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
