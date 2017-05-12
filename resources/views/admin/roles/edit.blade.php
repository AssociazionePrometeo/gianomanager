@extends('admin.layout')

@section('title', __('models.role_edit'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.role', 2) => route('admin.roles.index'),
        __('models.role_edit'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.role_edit') <em>{{ $role->name }}</em></p>
        </div>
        <div class="col push-right button-group">
          @if(!$role->isProtected())
            @can('delete', $role)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
          @else
            <button class="button outline" onclick="history.back()">@lang('pagination.back')</button>
          @endif
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($role, ['route' => ['admin.roles.update', $role], 'method' => 'post', 'class' => 'form', 'id' => 'form-edit']) !!}
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('admin.roles.form')

        <input type="submit" id="save" class="hide">
    </form>

    {!! Form::open(['route' => ['admin.roles.destroy', $role], 'method' => 'delete', 'id' => 'form-delete']) !!}
    <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
