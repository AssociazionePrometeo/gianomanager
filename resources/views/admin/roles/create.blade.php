@extends('admin.layout')

@section('title', __('models.role_new'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.role', 2) => route('admin.roles.index'),
        __('models.role_new'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.role_new')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <form action="{{ route('admin.roles.store') }}" method="post" class="form" id="form-edit">
            {{ csrf_field() }}

            @include('admin.roles.form')

            <input type="submit" id="save" class="hide">
        </form>
    </div>
@endsection

