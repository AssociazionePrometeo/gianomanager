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

        @include('form.error', ['field' => 'phone_number'])
        <label for="phone_number">Numero di telefono</label>
        <input type="phone" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">

        @include('form.error', ['field' => 'created_at'])
        <label for="created_at">Data di iscrizione</label>
        <input type="text" name="created_at" value="{{ old('created_at', $user->created_at) }}" readonly="readonly">

        @include('form.error', ['field' => 'expires_at'])
        <label for="expires_at">Data di scadenza</label>
        <input type="date" name="expires_at" value="{{ old('expires_at', $user->expires_at) }}">

        @include('form.error', ['field' => 'password'])
        <label for="password">Password</label>
        <input type="password" name="password">

        @include('form.error', ['field' => 'info'])
        <label for="info">Info</label>
        <input type="text" name="info" value="{{ old('info', $user->info) }}">

        @include('form.error', ['field' => 'active'])
        <label for="active">Verificato</label>
        <input type="hidden" name="active" value="0">
        <input type="checkbox" name="active" value="1" @if (old('active', $user->active) == "1") checked @endif >

        <button type="submit">Salva</button>
    </form>


@endsection
