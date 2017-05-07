@extends('admin.layout')

@section('title', 'Tessere')

@section('main')
    <header class="admin-header">
        <div class="row">
            <h1>Tessere</h1>
            <div class="push-right">
                <a href="{{ route('admin.cards.create') }}" class="button primary" role="button">Aggiungi nuova</a>
            </div>
        </div>
    </header>
    
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