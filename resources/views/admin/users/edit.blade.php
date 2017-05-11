@extends('admin.layout')

@section('title', __('models.user_edit'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.user', 2) => route('admin.users.index'),
        __('models.user_edit'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.user_edit') <em>{{ $user->name }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $user)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col col-12">
            {!! Form::model($user, [
                'route' => ['admin.users.update', $user],
                'method' => 'put',
                'class' => 'form',
                'id' => 'form-edit'
            ]) !!}
            @include('admin.users.form')
            <input type="submit" id="save" class="hide">
            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(['route' => ['admin.users.destroy', $user], 'method' => 'delete', 'id' => 'form-delete']) !!}
    <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
