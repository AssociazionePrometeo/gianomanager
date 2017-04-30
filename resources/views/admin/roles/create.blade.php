@extends('admin.layout')

@section('title', 'Nuovo ruolo')

@section('main')
    <header class="admin-header">
        <h1>Crea un nuovo ruolo</h1>
    </header>

    <form action="{{ route('admin.roles.store') }}" method="post">
            {{ csrf_field() }}

            @include('form.error', ['field' => 'id'])
            <label for="id">Identificatore</label>
            <input type="text" name="id" value="{{ old('id') }}">

            @include('form.error', ['field' => 'name'])
            <label for="name">Nome</label>
            <input type="text" name="name" value="{{ old('name') }}">

            <button type="submit">Salva</button>
    </form>

@endsection
