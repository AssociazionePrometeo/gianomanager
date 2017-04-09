@extends('admin.layout')

@section('title', 'Risorse')

@section('main')
    <header class="admin-header">
        <h1>Risorse</h1>
        
        <a href="{{ route('admin.resources.create') }}" class="add">Aggiungi nuova</a>
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
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->name }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.resources.edit', $resource) }}" class="edit">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection