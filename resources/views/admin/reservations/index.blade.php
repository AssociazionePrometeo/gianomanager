@extends('admin.layout')

@section('title', 'Prenotazioni')

@section('main')
    <header class="admin-header">
        <h1>Prenotazioni</h1>
        
        <a href="{{ route('admin.reservations.create') }}" class="add">Aggiungi nuova</a>
    </header>
    
    <table class="entities">
        <thead>
            <tr>
                <th>ID</th>
                <th>Risorsa</th>
                <th>Utente</th>
                <th>Inizio prenotazione</th>
                <th>Fine prenotazione</th>
                <th class="actions"><span>Azioni</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($reservations as $reservation)
                <tr>
                    <td>{{ $reservation->id }}</td>
                    <td>{{ $reservation->resource->name }}</td>
                    <td>{{ $reservation->user->name }}</td>
                    <td>{{ $reservation->starts_at->format('j F Y – H:i') }}</td>
                    <td>{{ $reservation->ends_at->format('j F Y – H:i') }}</td>
                    <td class="actions">
                        <a href="{{ route('admin.reservations.edit', $reservation) }}" class="edit">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection