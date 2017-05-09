@extends('admin.layout')

@section('title', 'Modifica tessera')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Tessere' => route('admin.cards.index'),
        'Modifica tessera',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica tessera <em>{{ $card->id }}</em></p>
        </div>
        <div class="col push-right button-group">
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
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

            {!! Form::close() !!}
        </div>
    </div>

    {!! Form::open(['route' => ['admin.cards.destroy', $card], 'method' => 'delete', 'id' => 'form-delete']) !!}{!! Form::close() !!}

@endsection
