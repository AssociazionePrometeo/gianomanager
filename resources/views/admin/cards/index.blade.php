@extends('admin.layout')

@section('title', 'Tessere')

@section('heading')
    @include('admin.breadcrumbs', ['items' => ['Tessere']])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Lista tessere</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('admin.cards.create') }}" class="button primary outline" role="button">
                <i class="material-icons">add</i>
                Aggiungi nuova
            </a>
        </div>
    </div>
@endsection

@section('content')
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utente</th>
                <th class="actions"><span>Azioni</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($cards as $card)
                <tr>
                    <td>{{ $card->id }}</td>
                    <td>{{ $card->user->name }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.cards.edit', $card) }}" class="button edit small" role="button">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection