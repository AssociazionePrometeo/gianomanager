@extends('layout')

@section('title', 'Nuova prenotazione')

@section('heading')

@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Crea una nuova prenotazione</p>
        </div>
        <div class="col push-right button-group">
            <button class="button" onclick="document.getElementById('form-edit').submit();">Salva</button>
        </div>
    </div>
@endsection

@section('content')
    {!! Form::open(['route' => 'reservations.store', 'method' => 'post', 'id' => 'form-edit']) !!}
        @include('user.reservations.form')
    {!! Form::close() !!}
@endsection
