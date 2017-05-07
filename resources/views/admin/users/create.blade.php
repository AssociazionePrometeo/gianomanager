@extends('admin.layout')

@section('title', 'Nuovo utente')

@section('main')
    <header class="admin-header">
        <h1>Crea un nuovo utente</h1>
    </header>

    {!! Form::open(['route' => 'admin.users.store', 'method' => 'post']) !!}

        @include('admin.users.form')

        <button type="submit">Salva</button>

    {!! Form::close() !!}

@endsection
