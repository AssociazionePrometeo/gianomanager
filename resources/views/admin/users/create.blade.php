@extends('admin.layout')

@section('title', 'Nuovo utente')

@section('main')
    <header class="admin-header">
        <h1>Crea un nuovo utente</h1>
    </header>

    <form action="{{ route('admin.users.store') }}" method="post">
            {{ csrf_field() }}

            @include('form.error', ['field' => 'name'])
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}">

            @include('form.error', ['field' => 'email'])
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">

            @include('form.error', ['field' => 'phone_number'])
            <label for="phone_number">Numero di telefono</label>
            <input type="phone" name="phone_number" value="{{ old('phone_number') }}">

            @include('form.error', ['field' => 'expires_at'])
            <label for="expires_at">Data di scadenza</label>
            <input type="date" name="expires_at" value="{{ old('expires_at') }}">

            @include('form.error', ['field' => 'password'])
            <label for="password">Password</label>
            <input type="password" name="password">

            @include('form.error', ['field' => 'info'])
            <label for="info">Info</label>
            <input type="text" name="info" value="{{ old('info') }}">

            @include('form.error', ['field' => 'active'])
            <label for="active">Attivo</label>
            <input type="text" name="active" value="{{ old('active') }}">

            <button type="submit">Salva</button>
    </form>

@endsection
