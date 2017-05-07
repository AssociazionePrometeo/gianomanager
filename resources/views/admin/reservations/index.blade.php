@extends('admin.layout')

@section('title', 'Prenotazioni')

@section('heading')
    @include('admin.breadcrumbs', ['items' => ['Prenotazioni']])
@endsection

@section('topbar')
    <div class="row topbar">
        <div class="col">
            <p>Lista prenotazioni</p>
        </div>
        <div class="col push-right">
            <a href="{{ route('admin.reservations.create') }}" class="button primary outline" role="button">
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
                        <a href="{{ route('admin.reservations.edit', $reservation) }}" class="button edit small" role="button">Modifica</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection