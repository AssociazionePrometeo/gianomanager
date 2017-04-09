@extends('admin.layout')

@section('title', 'Nuova risorsa')

@section('main')
    <header class="admin-header">
        <h1>Crea nuova risorsa</h1>
    </header>

    <form action="{{ route('admin.resources.store') }}" method="post" class="main">
        {{ csrf_field() }}

        @if ($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif
        <label for="name">Nome</label>
        <input type="text" name="name" value="{{ old('name') }}">

        <button type="submit">Salva</button>
    </form>
@endsection
