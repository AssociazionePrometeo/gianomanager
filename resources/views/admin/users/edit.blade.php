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

        @if ($errors->has('password'))
            <div class="error">{{ $errors->first('password') }}</div>
        @endif
        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit">Salva</button>
    </form>


@endsection
