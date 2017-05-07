@extends('admin.layout')

@section('title', 'Modifica tessera')

@section('main')
    <header class="admin-header">
        <h1>Modifica tessera</h1>
        <form action="{{ route('admin.cards.destroy', $card) }}" method="post" class="delete">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit" class="button delete">Elimina</button>
        </form>
    </header>

    <form action="{{ route('admin.cards.update', $card) }}" method="post" class="main">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @if ($errors->has('id'))
            <div class="error">{{ $errors->first('id') }}</div>
        @endif
        <label for="id">Identificativo</label>
        <input type="text" name="id" value="{{ old('id', $card->id) }}">

        @if ($errors->has('user_id'))
            <div class="error">{{ $errors->first('user_id') }}</div>
        @endif
        <label for="user_id">Utente</label>
        <select name="user_id">
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', $card->user->id) == $user->id ? 'selected' : ''}}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Salva</button>
    </form>
@endsection
