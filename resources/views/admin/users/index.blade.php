@extends('admin.layout')

@section('title', 'Utenti')

@section('main')
    <header class="admin-header">
        <h1>Utenti</h1>
        
        <a href="{{ route('admin.users.create') }}" class="add">Aggiungi nuovo</a>
    </header>
    
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th class="actions"><span>Azioni</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.users.edit', $user) }}" class="edit">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection