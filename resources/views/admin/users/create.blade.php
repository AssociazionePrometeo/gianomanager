@extends('admin.layout')

@section('title', 'Nuovo utente')

@section('main')
    <header class="admin-header">
        <h1>Crea un nuovo utente</h1>
    </header>

    <form action="{{ route('admin.users.store') }}" method="post">
            {{ csrf_field() }}

            @if ($errors->has('name'))
                <div class="error">{{ $errors->first('name') }}</div>
            @endif            
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}">

            @if ($errors->has('email'))
                <div class="error">{{ $errors->first('email') }}</div>
            @endif            
            <label for="email">Email</label>
            <input type="email" name="email" value="{{ old('email') }}">

            @if ($errors->has('password'))
                <div class="error">{{ $errors->first('password') }}</div>
            @endif            
            <label for="password">Password</label>
            <input type="password" name="password">

            <button type="submit">Salva</button>
    </form>

@endsection
