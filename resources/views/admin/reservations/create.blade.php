@extends('admin.layout')

@section('title', 'Nuova prenotazione')

@section('heading')
    @include('admin.breadcrumbs', ['items' => [
        'Prenotazioni' => route('admin.reservations.index'),
        'Crea prenotazione',
    ]])
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
    {!! Form::open(['route' => 'admin.reservations.store', 'method' => 'post', 'id' => 'form-edit']) !!}
        @include('admin.reservations.form')
    {!! Form::close() !!}
@endsection