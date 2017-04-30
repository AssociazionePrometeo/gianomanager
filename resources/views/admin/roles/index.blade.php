@extends('admin.layout')

@section('title', 'Utenti')

@section('main')
    <header class="admin-header">
        <h1>Ruoli</h1>
        
        <a href="{{ route('admin.roles.create') }}" class="add">Aggiungi nuovo</a>
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
                            <a href="{{ route('admin.roles.edit', $role) }}" class="edit">Modifica</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection