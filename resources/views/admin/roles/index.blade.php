@extends('admin.layout')

@section('title', 'Utenti')

@section('main')
    <header class="admin-header">
        <div class="row">
            <h1>Ruoli</h1>
            <div class="push-right">
                <a href="{{ route('admin.roles.create') }}" class="button primary" role="button">Aggiungi nuovo</a>
            </div>
        </div>
    </header>
    
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th class="actions"><span>Azioni</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $role->name }}</td>
                    <td class="actions">
                        @if(!$role->isProtected())
                            <a href="{{ route('admin.roles.edit', $role) }}" class="button edit small" role="button">Modifica</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection