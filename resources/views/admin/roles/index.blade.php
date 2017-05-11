@extends('admin.layout')

@section('title', 'Ruoli')

@section('heading')
    @include('admin.breadcrumbs', ['items' => ['Ruoli']])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Lista ruoli</p>
        </div>
        <div class="col push-right">
            @can('create', App\Role::class)
            <a href="{{ route('admin.roles.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                Aggiungi nuovo
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
        @foreach($roles as $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td class="actions">
                    @can('update', $role)
                    @if(!$role->isProtected())
                        <a href="{{ route('admin.roles.edit', $role) }}" class="button edit small" role="button">Modifica</a>
                    @endif
                    @endcan
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
