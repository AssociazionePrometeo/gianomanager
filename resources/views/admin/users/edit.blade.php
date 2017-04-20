@extends('admin.layout')

@section('title', 'Modifica utente')

@section('main')
    <header class="admin-header">
        <h1>Modifica <em>{{ $user->name }}</em></h1>
        <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="delete">
            {{ method_field("DELETE") }}
            {{ csrf_field() }}
            <button type="submit">Elimina</button>
        </form>
    </header>

    <form action="{{ route('admin.users.update', $user) }}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('form.error', ['field' => 'name'])
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">

        @include('form.error', ['field' => 'email'])
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">

        @include('form.error', ['field' => 'phone'])
        <label for="phone">Numero di telefono</label>
        <input type="phone" name="phone" value="{{ old('phone', $user->phone) }}">

        @include('form.error', ['field' => 'signup_date'])
        <label for="signup_date">Data di iscrizione</label>
        <input type="text" name="signup_date" value="{{ old('signup_date', $user->signup_date) }}">

        @include('form.error', ['field' => 'expires_at'])
        <label for="expires_at">Data di scadenza</label>
        <input type="date" name="expires_at" value="{{ old('expires_at', $user->expires_at) }}">

        @include('form.error', ['field' => 'password'])
        <label for="password">Password</label>
        <input type="password" name="password">

        @include('form.error', ['field' => 'info'])
        <label for="info">Info</label>
        <input type="text" name="info" value="{{ old('info', $user->info) }}">

        <button type="submit">Salva</button>
    </form>


@endsection
