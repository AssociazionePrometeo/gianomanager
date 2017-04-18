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

        @if ($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}">

        @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif
        <label for="email">Email</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}">

        @if ($errors->has('mobile_number'))
            <div class="error">{{ $errors->first('mobile_number') }}</div>
        @endif
        <label for="mobile_number">Numero di telefono</label>
        <input type="phone" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}">

        @if ($errors->has('signup_date'))
            <div class="error">{{ $errors->first('signup_date') }}</div>
        @endif
        <label for="signup_date">Data di iscrizione</label>
        <input type="text" name="signup_date" value="{{ old('signup_date', $user->signup_date) }}">

        @if ($errors->has('end_date'))
            <div class="error">{{ $errors->first('end_date') }}</div>
        @endif
        <label for="end_date">Data di scadenza</label>
        <input type="date" name="end_date" value="{{ old('end_date', $user->end_date) }}">

        @if ($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
        @endif
        <label for="password">Password</label>
        <input type="password" name="password">

        @if ($errors->has('info'))
            <div class="error">{{ $errors->first('info') }}</div>
        @endif
        <labelname for="info">Info</label>
        <input type="text" name="info" value="{{ old('info', $user->info) }}">

        <button type="submit">Salva</button>
    </form>


@endsection
