@extends('admin.layout')

@section('title', 'Utenti')

@section('heading')
    @include('admin.breadcrumbs', ['items' => ['Utenti']])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Lista utenti</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('admin.users.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                Aggiungi nuovo
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table>
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
                    <a href="{{ route('admin.users.edit', $user) }}" class="button edit small" role="button">Modifica</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection