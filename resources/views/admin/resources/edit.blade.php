@extends('admin.layout')

@section('title', 'Modifica risorsa')

@section('main')

    <header class="admin-header">
        <h1>Modifica <em>{{ $resource->name }}</em></h1>

        <form action="{{ route('admin.resources.destroy', $resource) }}" method="post" class="delete">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}
            <button type="submit">Elimina</button>
        </form>
    </header>

    <form action="{{ route('admin.resources.update', $resource) }}" method="post" class="main">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @if ($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name', $resource->name) }}">

        <button type="submit">Salva</button>
    </form>
@endsection
