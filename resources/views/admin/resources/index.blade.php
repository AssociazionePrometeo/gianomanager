@extends('admin.layout')

@section('title', 'Risorse')

@section('main')
    <header class="admin-header">
        <div class="row">
            <h1>Risorse</h1>
            <div class="push-right">
                <a href="{{ route('admin.resources.create') }}" class="button primary" role="button">Aggiungi nuova</a>
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
            @foreach($resources as $resource)
                <tr>
                    <td>{{ $resource->id }}</td>
                    <td>{{ $resource->name }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.resources.edit', $resource) }}" class="button edit small" role="button">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection