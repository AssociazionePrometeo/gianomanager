@extends('admin.layout')

@section('title', __('models.card_new'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.card', 2) => route('admin.cards.index'),
        __('models.card_new'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.card_new')</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'admin.cards.store', 'method' => 'post', 'class' => 'form', 'id' => 'form-edit']) !!}
        @include('admin.cards.form')
        <input type="submit" id="save" class="hide">
    {!! Form::close() !!}
@endsection
