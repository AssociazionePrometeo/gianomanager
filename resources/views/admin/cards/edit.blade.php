@extends('admin.layout')

@section('title', __('models.card_edit'))

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        trans_choice('models.card', 2) => route('admin.cards.index'),
        __('models.card_edit'),
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>@lang('models.card_edit') <em>{{ $card->id }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $card)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">@lang('actions.delete')</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">@lang('actions.save')</button>
        </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col col-12">
            {!! Form::model($card, [
                'route' => ['admin.cards.update', $card],
                'method' => 'put',
                'class' => 'form',
                'id' => 'form-edit'
            ]) !!}


            @include('admin.cards.form')
            <input type="submit" id="save" class="hide">

            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(['route' => ['admin.cards.destroy', $card], 'method' => 'delete', 'id' => 'form-delete']) !!}
        <input type="submit" id="delete" class="hide">
    {!! Form::close() !!}

@endsection
