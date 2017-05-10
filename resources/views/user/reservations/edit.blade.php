@extends('layout')

@section('title', 'Modifica prenotazione')

@section('heading')

@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica prenotazione <em>#{{ $reservation->id }}</em></p>
        </div>
        <div class="col push-right button-group">
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($reservation, [
        'route' => ['reservations.update', $reservation],
        'method' => 'put',
        'class' => 'form',
        'id' => 'form-edit'
    ]) !!}

    @include('user.reservations.form')

    {!! Form::close() !!}

    {!! Form::open(['route' => ['reservations.destroy', $reservation], 'method' => 'delete', 'id' => 'form-delete']) !!}{!! Form::close() !!}

@endsection
