@extends('admin.layout')

@section('title', 'Modifica ruolo')

@section('main')
    <header class="admin-header">
        <h1>Modifica <em>{{ $role->name }}</em></h1>
        <form action="{{ route('admin.roles.destroy', $role) }}" method="post" class="delete">
            {{ method_field("DELETE") }}
            {{ csrf_field() }}
            <button type="submit">Elimina</button>
        </form>
    </header>

    <form action="{{ route('admin.roles.update', $role) }}" method="post">
        {{ method_field('PUT') }}
        {{ csrf_field() }}

        @include('form.error', ['field' => 'id'])
        <label for="id">Identificatore</label>
        <input type="text" name="id" value="{{ old('id', $role->id) }}">

        @include('form.error', ['field' => 'name'])
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name', $role->name) }}">

        <button type="submit">Salva</button>
    </form>


@endsection
