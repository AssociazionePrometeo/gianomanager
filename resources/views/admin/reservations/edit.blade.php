@extends('admin.layout')

@section('title', 'Modifica prenotazione')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Prenotazioni' => route('admin.reservations.index'),
        'Modifica prenotazione',
    ]])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Modifica prenotazione <em>#{{ $reservation->id }}</em></p>
        </div>
        <div class="col push-right button-group">
            @can('delete', $reservation)
            <button class="button outline delete" onclick="document.getElementById('form-delete').submit()">Elimina</button>
            @endcan
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::model($reservation, [
        'route' => ['admin.reservations.update', $reservation],
        'method' => 'put',
        'class' => 'form',
        'id' => 'form-edit'
    ]) !!}

    @include('admin.reservations.form')

    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.reservations.destroy', $reservation], 'method' => 'delete', 'id' => 'form-delete']) !!}{!! Form::close() !!}

@endsection