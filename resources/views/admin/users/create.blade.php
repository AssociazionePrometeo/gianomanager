@extends('admin.layout')

@section('title', __('models.user_new'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.user', 2) => route('admin.users.index'),
        __('models.user_new'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.user_new')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col col-12">
            {!! Form::open(['route' => 'admin.users.store', 'method' => 'post', 'id' => 'form-edit']) !!}

                @include('admin.users.form')
                <input type="submit" id="save" class="hide">
            {!! Form::close() !!}
        </div>
    </div>

@endsection


