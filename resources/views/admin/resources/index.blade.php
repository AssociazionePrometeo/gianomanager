@extends('admin.layout')

@section('title', 'Risorse')

@section('heading')
    @include('admin.breadcrumbs', ['items' => ['Risorse']])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Lista risorse</p>
        </div>
        <div class="col push-right">
            @can('create', App\Resource::class)
            <a href="{{ route('admin.resources.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                Aggiungi nuova
            </a>
            @endcan
        </div>
    </div>
@endsection

@section('content')
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
                        @can('update', $resource)
                        <a href="{{ route('admin.resources.edit', $resource) }}" class="button edit small" role="button">Modifica</a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection